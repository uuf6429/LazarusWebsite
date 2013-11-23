<?php

class Page {
	
	protected $_js = array();
	protected $_css = array();
	
	protected $_app;
	
	protected $_title = 'Untitled';
	
	protected $_meta = array(
		'description' => '',
		'copyright' => '',
		'keywords' => '',
		'author' => '',
	);
	
	protected $_rendered = false;
	
	/**
	 * @var Exception
	 */
	protected $_exception;
	
	public function __construct(Application $app){
		$this->_app = $app;
	}
	
	/**
	 * Sets current page title.
	 * @param string $title New title.
	 * @throws Exception
	 */
	public function set_title($title){
		if($this->_rendered)
			throw new Exception('Page has already been rendered');
		$this->_title = $title;
	}
	
	/**
	 * @return string Current page title.
	 */
	public function get_title(){
		return $this->_title;
	}
	
	/**
	 * Sets value for page meta.
	 * @param string $name Name of meta.
	 * @param string $value New value.
	 * @throws Exception
	 */
	public function set_meta($name, $value){
		if($this->_rendered)
			throw new Exception('Page has already been rendered');
		if(!isset($this->_meta[$name]))
			throw new Exception('Unsupported meta "'.$name.'"');
		$this->_meta[$name] = $value;
	}
	
	/**
	 * Returns meta value.
	 * @param string $name Meta name.
	 * @return string Meta value.
	 * @throws Exception
	 */
	public function get_meta($name){
		if(!isset($this->_meta[$name]))
			throw new Exception('Unsupported meta "'.$name.'"');
		return $this->_meta[$name];
	}
	
	protected $_name_cache = null;
	
	/**
	 * Attempts to retrieve page name via various conditions.
	 * @return string Page name.
	 */
	public function get_name(){
		
		if(is_null($this->_name_cache)){
			
			$this->_name_cache = '';
			
			// try with URL rewriting, if enabled
			if($this->_app->get_config()->get('rewrite', false)){
				$uri = substr($_SERVER['REQUEST_URI'], strlen(DEF_WEBPATH));
				$uri = explode('?', $uri, 2);
				$segments = explode('/', trim($uri[0], '/'), 3);
				$this->_name_cache = array_pop($segments);
			}
				
			// try with 'page' HTTP parameter
			if(!$this->_name_cache){
				if(isset($_GET['page']))
					$this->_name_cache = $_GET['page'];
				if(isset($_POST['page']))
					$this->_name_cache = $_POST['page'];
			}
			
			// sanitize user input
			$this->_name_cache = preg_replace('/[^A-Za-z0-9\-_]/', '', $this->_name_cache);
		}
		
		return $this->_name_cache;
	}
	
	/**
	 * Returns page type: home, page, error
	 * @return string
	 */
	public function get_type(){
		switch(true){
			case !!$this->_exception:
				return 'error';
			case !!$this->get_name():
				return 'page';
			default:
				return 'home';
		}
	}
	
	/**
	 * Returns the current page error (if any)
	 * @return Exception|null Exception object or null if no error occurred.
	 */
	public function get_error(){
		return $this->_exception;
	}
	
	/**
	 * Gets a page's content.
	 * @param string $name Page name.
	 * @return string Page content.
	 */
	public function get_content($name){
		if(!file_exists(DEF_ABSPATH.DS.'pages'.DS.$name.'.php'))
			throw new ResourceNotFoundException('Could not load page named "'.$name.'".');
		ob_start();
		include(DEF_ABSPATH.DS.'pages'.DS.$name.'.php');
		return ob_get_clean();
	}
	
	/**
	 * @return string File rendered HTML.
	 */
	protected function _get_part($path){
		if(file_exists(DEF_ABSPATH.DS.$path)){
			ob_start();
			include(DEF_ABSPATH.DS.$path);
			return ob_get_clean();
		}else{
			throw new ResourceNotFoundException('File "'.$path.'" could not be found');
		}
	}
	
	/**
	 * @return string Header HTML.
	 */
	protected function _get_header(){
		return $this->_get_part('theme'.DS.'header.php');
	}

	/**
	 * @return string Body HTML.
	 */
	protected function _get_body(){
		return $this->_get_part('theme'.DS.$this->get_type().'.php');
	}
	
	/**
	 * @return string Footer HTML.
	 */
	protected function _get_footer(){
		return $this->_get_part('theme'.DS.'footer.php');
	}
	
	/**
	 * Cleans up any output buffers.
	 */
	protected function _clean_buffers(){
		$max = 1000; // give up after these much tries
		while(ob_get_level() && $max--)
			ob_end_clean();
	}
	
	/**
	 * Renders the current page, from top to bottom.
	 */
	public function render(){
		$this->_js = array();
		$this->_css = array();
		
		// looks weird, but we get dependencies from body ...
		$body = $this->_get_body();

		// ... therefore we render header/footer afterwards.
		$head = $this->_get_header();
		$foot = $this->_get_footer();
		
		// remove any leaked content
		$this->_clean_buffers();
		
		// ... and we're done ... clean up and return
		$this->_rendered = true;
		echo $head . $body . $foot;
	}
	
	/**
	 * A "soft" error occurred. Try to recover nicely.
	 */
	public function render_soft_error(Exception $ex){
		$this->_js = array();
		$this->_css = array();
		$this->_exception = $ex;
		
		// set up HTTP status header
		if(!headers_sent() && $ex instanceof ServerException){
			static $msgs = array(
				100 => 'Continue',
				101 => 'Switching Protocols',
				200 => 'OK',
				201 => 'Created',
				202 => 'Accepted',
				203 => 'Non-Authoritative Information',
				204 => 'No Content',
				205 => 'Reset Content',
				206 => 'Partial Content',
				300 => 'Multiple Choices',
				301 => 'Moved Permanently',
				302 => 'Found',  // 1.1
				303 => 'See Other',
				304 => 'Not Modified',
				305 => 'Use Proxy',
				307 => 'Temporary Redirect',
				400 => 'Bad Request',
				401 => 'Unauthorized',
				402 => 'Payment Required',
				403 => 'Forbidden',
				404 => 'Not Found',
				405 => 'Method Not Allowed',
				406 => 'Not Acceptable',
				407 => 'Proxy Authentication Required',
				408 => 'Request Timeout',
				409 => 'Conflict',
				410 => 'Gone',
				411 => 'Length Required',
				412 => 'Precondition Failed',
				413 => 'Request Entity Too Large',
				414 => 'Request-URI Too Long',
				415 => 'Unsupported Media Type',
				416 => 'Requested Range Not Satisfiable',
				417 => 'Expectation Failed',
				500 => 'Internal Server Error',
				501 => 'Not Implemented',
				502 => 'Bad Gateway',
				503 => 'Service Unavailable',
				504 => 'Gateway Timeout',
				505 => 'HTTP Version Not Supported',
				509 => 'Bandwidth Limit Exceeded',
			);
			$code = $ex->getCode();
			$mesg = $msgs[isset($msgs[$code]) ? $code : 500];
			header("HTTP/1.1 $code $mesg", true, $code);
		}
		
		echo $this->render();
	}
	
	/**
	 * A "hard" error occurred. Clean up, give up and mail the admins.
	 */
	public function render_hard_error(Exception $ex1, Exception $ex2){
		$this->_js = array();
		$this->_css = array();
		trigger_error(
			"A system double fault occurred (an exception was thrown while handling another one).\r\n"
			+ "Fault 1: ".$ex1->getMessage()." (".basename($ex1->getFile()).":".$ex1->getLine().")\r\n"
			+ "Fault 2: ".$ex2->getMessage()." (".basename($ex2->getFile()).":".$ex2->getLine().")", E_USER_ERROR
		);
	}
	
	/**
	 * Renders menu by name.
	 * @param string $name Menu name.
	 * @param string $mode Menu render mode:
	 * links - List of links.
	 * lists - Links inside unordered lists
	 * @param string $text_field Text field name.
	 * @return string Menu html.
	 */
	public function get_menu($name, $mode = 'links', $text_field = 'text'){
		$cfg = $this->_app->get_config();
		$html = '';
		
		foreach($cfg->get_keys("menus.$name") as $i){
			
			if($cfg->is_section("menus.$name.$i")){
				// menu items
				$id = $cfg->get("menus.$name.$i.id");
				$url = $cfg->get("menus.$name.$i.url", '');
				$text = $cfg->get("menus.$name.$i.$text_field", '');
				$target = $cfg->get("menus.$name.$i.target");
				if(substr($url, 0, 5) == 'page:')
					$url = $this->get_url(substr($url, 5));
				$item = '<a '.($id ? 'id="'.esc_html($id).'" ' : '')
					.($target ? 'target="'.esc_html($target).'" ' : '')
					.' href="'.esc_html($url).'">'.esc_html($text).'</a>';
				if($mode == 'lists')
					$item = "<li>$item</li>";
			}else{
				// separator
				$item = '<hr/>';
				if($mode == 'lists')
					$item = "<li>$item</li>";
			}
			
			$html .= $item;
		}
		
		if($mode == 'lists')
			$html = "<ul>$html</ul>";
		return $html;
	}
	
	/**
	 * Returns URL for a page.
	 * @param string $page Page name (empty = home).
	 */
	public function get_url($page){
		if($this->_app->get_config()->get('rewrite', false)){
			return DEF_WEBPATH.'/'.$page;
		}else{
			return DEF_WEBPATH.'/?page='.$page;
		}
	}
	
	/**
	 * Add javascript file to page.
	 * @param string $file File path relative to theme.
	 * @param string $version File version (use special value "modified" to use file modification date)
	 * @param boolean $in_head Whether to render the script in the head (true) or before closing body (false).
	 */
	public function add_js($file, $version, $in_head = true){
		if($version == 'modified')
			$version = filemtime(DEF_ABSPATH.DS.'theme'.DS.str_replace('/', DS, $file));
		$this->_js[] = array(
			'src' => DEF_WEBPATH.'/theme/'.$file.'?v='.$version,
			'inh' => $in_head, 
		);
	}
	
	/**
	 * Add stylesheet file to page
	 * @param string $file File path relative to theme.
	 * @param string $version File version (use special value "modified" to use file modification date)
	 * @param string $media CSS media target.
	 */
	public function add_css($file, $version, $media='screen'){
		if($version == 'modified')
			$version = filemtime(DEF_ABSPATH.DS.'theme'.DS.str_replace('/', DS, $file));
		$this->_css[] = array(
			'href' => DEF_WEBPATH.'/theme/'.$file.'?v='.$version,
			'media' => $media,
		);
	}
	
	/**
	 * Print page header stuff.
	 */
	public function do_header(){
		echo PHP_EOL;
		$copy = $this->_css;
		while($css = array_shift($copy)){
			echo '<link rel="stylesheet" href="'.esc_html($css['href']).'" media="'.$css['media'].'" />'.PHP_EOL;
		}
		$copy = $this->_js;
		while($js = array_shift($copy))
			if($js['inh'])
				echo '<script type="text/javascript" src="'.esc_html($js['src']).'"></script>'.PHP_EOL;
	}
	
	/**
	 * Print page footer stuff.
	 */
	public function do_footer(){
		echo PHP_EOL;
		$copy = $this->_js;
		while($js = array_shift($copy))
			if(!$js['inh'])
				echo '<script type="text/javascript" src="'.esc_html($js['src']).'"></script>'.PHP_EOL;
	}
}

/**
 * @return Page The current page.
 */
function Page(){
	return Application()->get_page();
}