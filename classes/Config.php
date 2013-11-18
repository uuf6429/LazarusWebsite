<?php

	class Config {
		protected $_data = array();
		
		public function __construct($dsn){
			$this->load($dsn);
		}
		
		/**
		 * @ignore
		 */
		public function _arrayize($array){
			if(is_array($array))
				foreach($array as $key => $value)
					if(is_object($value) || is_array($value))
						$array[$key] = array_map(array($this, __FUNCTION__), (array)$value);
			return $array;
		}
		
		/**
		 * Load configuration.
		 * @param string $dsn Data source to load from.
		 */
		public function load($dsn){
			switch(pathinfo($dsn, PATHINFO_EXTENSION)){
				case 'php':
					$this->_data = include($dsn);
					break;
				case 'ini':
					$this->_data = parse_ini_file($dsn);
					break;
				case 'json':
					$this->_data = json_decode(file_get_contents($dsn));
					break;
				default:
					throw new Exception('Unsupported config file format');
			}
			// convert all object to arrays
			$this->_data = $this->_arrayize((array)$this->_data);
		}
		
		/**
		 * Save configuration.
		 * @param string $dsn Data source to save to.
		 * @todo
		 */
		public function save($dsn){
			throw new Exception('Saving config file not supported yet');
		}
		
		/**
		 * Return configuration value
		 * @param string $path Configuration path (eg: application.paths.temp).
		 * @param mixed $default Default value returned when path does not exist.
		 * @return mixed Config value or $default
		 */
		public function get($path, $default = null){
			$path = explode('.', $path);
			$temp = $this->_data;
			foreach($path as $item){
				if(!isset($temp[$item])){
					$temp = $default;
					break;
				}
				$temp = $temp[$item];
			}
			return $temp;
		}
		
		/**
		 * Gets the keys of an array value.
		 * @param string $path Path to value.
		 * @return array Array of keys.
		 */
		public function get_keys($path){
			$path = explode('.', $path);
			$temp = $this->_data;
			foreach($path as $item){
				if(!isset($temp[$item])){
					return array();
				}
				$temp = $temp[$item];
			}
			return is_array($temp) ? array_keys($temp) : array();
		}
		
		/**
		 * Sets the configuration.
		 * @param string $path Configuration path name.
		 * @param mixed $value The new value.
		 */
		public function set($path, $value){
			$path = explode('.', $path);
			$temp = &$this->_data;
			foreach($path as $item){
				if(!isset($temp[$item])){
					$temp[$item] = array();
				}
				$temp = &$temp[$item];
			}
			$temp = $value;
		}
	}