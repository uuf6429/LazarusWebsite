<?php

class Application {
	protected $_config;
	protected $_page;
	
	protected static $_current;
	
	public function __construct(Config $config){
		self::$_current = $this;
		
		$this->_config = $config;
		$this->_page = new Page($this);
		$this->_page->set_title($config->get('deftitle', 'Untitled'));
	}
	
	/**
	 * Don't we all hate singletons? *sigh*
	 */
	public static function get_instance(){
		return self::$_current;
	}
	
	/**
	 * @return Config Current configuration instance.
	 */
	public function get_config(){
		return $this->_config;
	}
	
	/**
	 * @return Page Current page instance.
	 */
	public function get_page(){
		if(!$this->_page)
			throw new Exception('Page currently not loaded');
		return $this->_page;
	}
	
	public function run(){
		try {
			
			// attempt to build and render page
			$this->get_page()->render();
			
		}catch(Exception $ex1){
			try{
				
				// soft failure: display nice message and quite
				$this->get_page()->render_soft_error($ex1);
				
			}catch(Exception $ex2){
				
				// hard failure...something is seriously wrong
				$this->get_page()->render_hard_error($ex1, $ex2);
				
			}
		}
	}
}

/**
 * @return Application The current application.
 */
function Application(){
	return Application::get_instance();
}
