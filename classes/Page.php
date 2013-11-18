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
			
			if($this->_app->get_config()->get('rewrite', false)){
				
				// try with URL rewriting
				$uri = substr($_SERVER['REQUEST_URI'], strlen(DEF_WEBPATH));
				$uri = explode('?', $uri, 2);
				$segments = explode('/', trim($uri[0], '/'), 3);
				$this->_name_cache = array_pop($segments);
				
			}else{
				
				// try with 'page' HTTP parameter
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
	 * Renders a page's content.
	 * @param string $name Page name.
	 */
	public function render_content($name){
		require(DEF_ABSPATH.DS.'pages'.DS.$name.'.php');
	}
	
	/**
	 * @return string File rendered HTML.
	 */
	protected function _get_part($path){
		if(file_exists(DEF_ABSPATH.DS.$path)){
			ob_start();
			require(DEF_ABSPATH.DS.$path);
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
	 * Renders the current page, from top to bottom.
	 */
	public function render(){
		// looks weird, but we get dependencies from body ...
		$body = $this->_get_body();
		
		// ... therefore we render header/footer afterwards.
		$head = $this->_get_header();
		$foot = $this->_get_footer();
		
		// ... and we're done ... clean up and return
		$this->_rendered = true;
		echo $head . $body . $foot;
	}
	
	/**
	 * A "soft" error occurred. Try to recover nicely.
	 */
	public function render_soft_error(Exception $ex){
		$this->_exception = $ex;
		
		if(!headers_sent() && $ex instanceof ServerException){
			header($ex->getHeader(), true, $ex->getStatus());
		}
		
		echo $this->render();
	}
	
	/**
	 * A "hard" error occurred. Clean up, give up and mail the admins.
	 */
	public function render_hard_error(Exception $ex1, Exception $ex2){
		if(!headers_sent())header('HTTP/1.1 500 Internal Server Error', true, 500);
		die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
			<html><head>
				<title>500 Internal Server Error</title>
			</head><body>
				<h1>Internal Server Error</h1>
				<p>The server encountered an internal error or
				misconfiguration and was unable to complete
				your request.</p>
				<p>Please contact the server administrator,
				 webmaster@'.$_SERVER['SERVER_NAME'].' and inform them of the time the error occurred,
				and anything you might have done that may have
				caused the error.</p>
				<p>More information about this error may be available
				in the server error log.</p>
				<p>Fault 1: '.$ex1->getMessage().' ('.basename($ex1->getFile()).':'.$ex1->getLine().')<br/>
				Fault 2: '.$ex2->getMessage().' ('.basename($ex2->getFile()).':'.$ex2->getLine().')</p>
			</body></html>');
	}
	
	/**
	 * Renders menu by name.
	 * @param string Menu name.
	 * @return string Menu html.
	 */
	public function get_menu($name){
		$cfg = $this->_app->get_config();
		$html = '';
		foreach($cfg->get_keys("menus.$name") as $i){
			$id = $cfg->get("menus.$name.$i.id");
			$url = $cfg->get("menus.$name.$i.url", '');
			$text = $cfg->get("menus.$name.$i.text", '');
			$target = $cfg->get("menus.$name.$i.target");
			if(substr($url, 0, 5) == 'page:')
				$url = $this->get_url(substr($url, 5));
			$html .= '<a '.($id ? 'id="'.$id.'" ' : '')
				.($target ? 'target="'.$target.'" ' : '')
				.' href="'.esc_html($url).'">'.$text.'</a>';
		}
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
	 */
	public function add_js($file, $version){
		if($version == 'modified')
			$version = filemtime(DEF_ABSPATH.DS.'theme'.DS.str_replace('/', DS, $file));
		$this->_js[] = array(
			'src' => DEF_WEBPATH.'/theme/'.$file.'?v='.$version,
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
		while($css = array_pop($this->_css)){
			echo '<link rel="stylesheet" href="'.esc_html($css['href']).'" media="'.$css['media'].'" />';
		}
		while($js = array_pop($this->_js)){
			echo '<script type="text/javascript" src="'.esc_html($js['src']).'"></script>';
		}
	}
	
	/**
	 * Print page footer stuff.
	 */
	public function do_footer(){
		while($js = array_pop($this->_js)){
			echo '<script type="text/javascript" src="'.esc_html($js['src']).'"></script>';
		}
	}
}

/**
 * @return Page The current page.
 */
function Page(){
	return Application()->get_page();
}