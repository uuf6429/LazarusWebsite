<?php

	class Config {
		/**
		 * @var array Loaded config data.
		 */
		protected $_data = array();
		
		/**
		 * @var EnvVarProvider[] Environment Variable provider object.
		 */
		protected $_evpo = array();
		
		/**
		 * @param EnvVarProvider $env Environment Variable provider object.
		 * @param array|string $dsns Either an array of DSNs to load config from, or a string with one DSN.
		 */
		public function __construct($env = null, $dsns = null){
			$this->_evpo = $env ? $env : new EnvVarProvider();
			// load one dsn entry
			if(is_string($dsns))
				$this->load($dsns);
			// load several dsns
			if(is_array($dsns))
				$this->load_multi($dsns);
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
		 * Remove all of the existing config.
		 */
		public function clear(){
			$this->_data = array();
		}
		
		/**
		 * Load config from multiple DSNs.
		 * @param array $dsns List of DSN strings.
		 */
		public function load_multi($dsns){
			foreach($dsns as $dsn)
				$this->load($dsn, false);
			$this->_data = $this->_expand_envvars($this->_data);
		}
		
		/**
		 * Load configuration.
		 * @param string $dsn Data source to load from.
		 * @param boolean $expand Whether to expand envvars or not.
		 */
		public function load($dsn, $expand = true){
			// load config data
			switch(pathinfo($dsn, PATHINFO_EXTENSION)){
				case 'php':
					$data = include($dsn);
					break;
				case 'ini':
					$data = parse_ini_file($dsn);
					break;
				case 'json':
					$data = json_decode(file_get_contents($dsn));
					break;
				default:
					throw new Exception('Unsupported config file format');
			}
			
			// convert all object to arrays
			$data = $this->_arrayize((array)$data);
			
			// merge with existing config
			$this->_data = array_merge_recursive($this->_data, $data);
			
			// expand all envvars
			if($expand)$this->_data = $this->_expand_envvars($this->_data);
		}
		
		/**
		 * Save configuration.
		 * @param string $dsn Data source to save to.
		 * @todo
		 */
		public function save($dsn){
			// convert all object to arrays
			$data = $this->_arrayize((array)$this->_data);
			
			// compress envvars
			$data = $this->_compress_envvars($data);
			
			// persist to storage
			switch(pathinfo($dsn, PATHINFO_EXTENSION)){
				case 'php':
					$data = '<'.'?php return '.var_export($data, true).'; ?>';
					file_put_contents($dsn, $data);
					break;
				// FIXME There is no easy way to generate INI files, so let's ignore this for now
				case 'json':
					file_put_contents($dsn, json_encode($data));
					break;
				default:
					throw new Exception('Unsupported config file format');
			}
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
		
		/**
		 * Returns whether specified path contains a section (array) or a single value.
		 * @return boolean
		 */
		public function is_section($path){
			return is_array($this->get($path));
		}
		
		/**
		 * Expands all environment variables in a value.
		 * @param mixed $value The old value.
		 * @return mixed The new value.
		 */
		protected function _expand_envvars($value){
			switch(true){
				case is_string($value):
					foreach($this->_evpo->get_all() as $key => $val)
						$value = str_replace("%$key%", $val, $value);
					echo($value.PHP_EOL);
					break;
				case is_array($value):
					foreach($value as $k=>$v)
						$value[$k] = $this->_expand_envvars($v);
					break;
				case is_object($value):
					foreach(get_object_vars($value) as $k=>$v)
						$value->$k = $this->_expand_envvars($v);
					break;
			}
			return $value;
		}
		
		/**
		 * Compresses any relevant data into environment variables.
		 * @param mixed $value The old value.
		 * @return mixed The new value.
		 */
		protected function _compress_envvars($value){
			switch(true){
				case is_string($value):
					foreach($this->_evpo->get_all() as $key => $val)
						$value = str_replace($val, "%$key%", $value);
					break;
				case is_array($value):
					foreach($value as $k=>$v)
						$value[$k] = $this->_compress_envvars($v);
					break;
				case is_object($value):
					foreach(get_object_vars($value) as $k=>$v)
						$value->$k = $this->_compress_envvars($v);
					break;
			}
			return $value;
		}
	}