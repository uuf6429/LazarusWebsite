<?php

class EnvVarProvider {
	protected $_entries = array();
	
	/**
	 * @return array List of all supported keys.
	 */
	public function get_keys(){
		return array_keys($this->_entries);
	}
	
	/**
	 * @param string $key The key's name.
	 * @return mixed The key's value.
	 */
	public function get_value($key){
		list($t, $v) = $this->_entries[$key];
		switch($t){
			case 'v': return $v;
			case 'c': return $v($key);
			default: throw new Exception('Unknown type "'.$t.'" for entry "'.$key.'"');
		}
	}
	
	/**
	 * Add simple value-based variable.
	 * @param string $key Variable name.
	 * @param mixed $value Variable value.
	 */
	public function add_value($key, $value){
		$this->_entries[$key] = array('v', $value);
	}
	
	/**
	 * Add callback-based variable.
	 * @param string $key Variable name.
	 * @param callable $callback Callback that returns a value.
	 */
	public function add_call($key, $callback){
		$this->_entries[$key] = array('c', $callback);
	}
	
	/**
	 * @return array List of key=>value pairs of all variables.
	 */
	public function get_all(){
		$keys = $this->get_keys();
		$values = array_map(array($this, 'get_value'), $keys);
		return array_combine($keys, $values);
	}
}
