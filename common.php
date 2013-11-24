<?php

	/**
	 * Platform-specific path separator.
	 */
	define('DS', DIRECTORY_SEPARATOR);

	/**
	 * Default timezone
	 */
	define('DEF_TIMEZONE', 'UTC');

	/**
	 * Web URL without final slash
	 */
	define('DEF_WEBPATH', '/lazaruswebsite');

	/**
	 * Root path without final separator
	 */
	define('DEF_ABSPATH', dirname(__FILE__));
	
	// do not show errors (for security reasons)
	ini_set('display_errors', false);
	
	// set the default timezone
	date_default_timezone_set(DEF_TIMEZONE);
	
	/**
	 * Fatal exception handler (this is mostly to handle catastrophic failures).
	 */
	function shutdown_handler(){
		
		$fatal_errors = array(E_COMPILE_ERROR, E_CORE_ERROR, E_ERROR, E_USER_ERROR);
		$last = error_get_last();
		
		if($last && in_array($last['type'], $fatal_errors)){

			// remove any open buffers
			$max = 1000; // give up after these much tries
			while(ob_get_level() && $max--)ob_end_clean();
			
			// set status header
			if(!headers_sent())header('HTTP/1.1 500 Internal Server Error', true, 500);
			
			// write the error message
			echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
				<html><head>
					<title>500 Internal Server Error</title>
				</head><body>
					<h1>Internal Server Error</h1>
					<p>The server encountered an internal error or
					misconfiguration and was unable to complete
					your request.</p>
					<p>Please contact the server administrator,
					 webmaster@'.$_SERVER['SERVER_NAME'].' and inform them of the time the error occurred,
					and anything you might have done that may have caused the error.</p>
					<p>More information about this error may be available in the server error log.</p>';
			if(Application()->get_config()->get('debug', false)){
				echo '<pre>'.$last['message'].' ('.basename($last['file']).':'.$last['line'].')</pre>';
			}
			echo '</body></html>';
			die;
		}
	}
	register_shutdown_function('shutdown_handler');

	/**
	 * This is our class autoloader.
	 * @param string $name The class to load.
	 * @return boolean True if class is loaded, false otherwise.
	 */
	function boot_autoloader($name){
		if (class_exists($name) || interface_exists($name)) {
			return true;
		}

		if ((version_compare(PHP_VERSION, '5.4.0') >= 0) && trait_exists($name)) {
			return true;
		}

		$path = explode('_', $name);
		$class = end($path);
		$interfaceKey = array_search('Interface', $path);
		if ($interfaceKey !== false) {
			unset($path[$interfaceKey]);
			$class = 'Interface_'.$class;
		}

		$interfaceKey = array_search('Trait', $path);
		if ($interfaceKey !== false) {
			unset($path[$interfaceKey]);
			$class = 'Trait_'.$class;
		}

		$path = array_slice($path, 0, count($path) - 1);
		$path = implode(DS, $path);
		if (!empty($path)) {
			$path .= DS;
		}

		$filename = DEF_ABSPATH.DS.'classes'.DS.$path.$class.'.php';

		if (is_readable($filename)) {
			require($filename);
			return true;
		} else {
			return false;
		}
	}
	spl_autoload_register('boot_autoloader');

	/**
	 * Converts PHP errors to ErrorException.
	 * @param int $code
	 * @param string $mesg
	 * @param string $file
	 * @param int $line
	 * @throws ErrorException
	 */
	function error_to_exception($code, $message, $file = 'unknown', $line = 0, $context = array()){
		throw new ContextErrorException($message, $code, 1, $file, $line, $context);
	}
	set_error_handler('error_to_exception');

	/**
	 * Convert file size from bytes to human-readable/compact format.
	 * @param integer $size Original file size in bytes.
	 * @return string Human-readable size.
	 */
	function bytes_to_human($size){
		$type=array('bytes','KB','MB','GB','TB','PB','EB','ZB','YB');
		$i=0;
		while($size>=1024){
			$size/=1024;
			$i++;
		}
		return (ceil($size*100)/100).' '.$type[$i];
	}

	/**
	 * Returns escaped text.
	 * @param string $text The text to escape.
	 * @return string The escaped text as HTML.
	 */
	function esc_html($text){
		return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
	}

	/**
	 * Prints out text as escaped html.
	 * @param string $text The text to escape and print.
	 */
	function e_esc_html($text){
		echo esc_html($text);
	}