<?php

	class Chronometer {
		protected static $_instance;
		
		const UNIT_RAW        = 0;
		const UNIT_DATA_SIZE  = 1;
		const UNIT_TIME_SEC   = 2;
		
		protected $_counters = array();
		protected $_samples = array();
		
		/**
		 * Since you can only have on chronometer per request, a singleton is used.
		 * @return Chronometer
		 */
		public static function getInstance(){
			return self::$_instance;
		}
		
		public function __construct(){
			self::$_instance = $this;
		}
		
		/**
		 * Add counter to chronometer.
		 * @param string $name Counter name.
		 * @param integer $unit Counter unit type (see Chronometer::UNIT_* constants).
		 * @param callable $callback Counter callback.
		 * @param array $arguments (Optional) Callback arguments.
		 */
		public function add_counter($name, $unit, $callback, $arguments = array()){
			$this->_counters[] = (object)array('n'=>$name, 'u'=>$unit, 'c'=>$callback, 'a'=>$arguments);
		}
		
		/**
		 * Formats a raw value into human-readable value according to unit type.
		 * @param float $value Original value.
		 * @param integer $unit Unit type (see Chronometer::UNIT_* constants).
		 * @return string Formatted value.
		 */
		protected function format($value, $unit){
			switch($unit){
				case self::UNIT_TIME_SEC:
					return number_format($value, 3).'s';
				case self::UNIT_DATA_SIZE:
					return bytes_to_human($value);
				case self::UNIT_RAW:
					return $value;
				default:
					throw new Exception("Unsupported unit type `$unit`");
			}
		}
		
		/**
		 * Take a snapshort right now.
		 */
		public function take_sample(){
			$sample = array();
			foreach($this->_counters as $ctr)
				$sample[$ctr->n] = call_user_func_array($ctr->c, $ctr->a);
			$this->_samples[] = $sample;
		}
		
		/**
		 * Return all snapshots.
		 * @return array
		 */
		public function get_samples(){
			return $this->_samples;
		}
		
		/**
		 * Get a string representation of chronometer state.
		 * @return string
		 */
		public function __toString(){
			return $this->toString();
		}
		
		/**
		 * Get a string representation of chronometer state.
		 * @return string
		 */
		public function toString(){
			$res = array();
			
			if(count($this->_samples) > 1){
				$f = $this->_samples[0];
				$l = $this->_samples[count($this->_samples) - 1];
				
				foreach($this->_counters as $ctr)
					$res[] = ucwords(str_replace('_', ' ', $ctr->n)) . ': '
						. $this->format($l[$ctr->n] - $f[$ctr->n], $ctr->u);
			}else{
				$res[] = 'Not enough chronometer samples.';
			}
			
			return implode(' | ', $res);
		}
	}

	/**
	 * @return Chronometer
	 */
	function Chronometer(){
		return Chronometer::getInstance();
	}