<?php

class SourceForgeHelper {
	/**
	 * @var Config
	 */
	protected $_cfg;
	
	public function __construct(Config $cfg){
		$this->_cfg = $cfg;
	}
	
	/**
	 * @return string Cache file path.
	 */
	protected function get_cache(){
		return DEF_ABSPATH.DS.'cache'.DS.'sfh_versions.php';
	}
	
	/**
	 * @return boolean Returns whether cache is valid or not.
	 */
	protected function is_cached(){
		return file_exists($this->get_cache()) &&
			filectime($this->get_cache()) < strtotime($this->_cfg->get('sfversionttl', '+1 hour'));
	}
	
	/**
	 * Update info with SourceForge server.
	 */
	protected function update_cache(){
		$html = file_get_contents($this->_cfg->get('sfbaseurl'));
		if($html === false || !trim($html))
			throw new Exception('Could not read SourceForge website');
		$mtch = null;
		if(!preg_match('/lazarus-(\\d+.\\d+.\\d+)-fpc-(\\d+.\\d+.\\d+)-/', $html, $mtch))
			throw new Exception('Could not parse version from SourceForge');
		$data = array(
			'laz' => $mtch[1],
			'fpc' => $mtch[2],
		);
		$data = '<'.'?php return '.var_export($data, true).'; ?>';
		file_put_contents($this->get_cache(), $data);
	}
	
	/**
	 * Loads the cache and stores it in a static variable.
	 * @return object Cache data.
	 */
	protected function load_cache(){
		static $cached = null;
		
		if(!$cached){
			if (!$this->is_cached()) $this->update_cache();
			$cached = (object)include($this->get_cache());
		}
		
		return $cached;
	}
	
	/**
	 * @return string Lazarus version.
	 */
	public function get_laz_version(){
		return $this->load_cache()->laz;
	}
	
	/**
	 * @return string FPC version.
	 */
	public function get_fpc_version(){
		return $this->load_cache()->fpc;
	}
}
