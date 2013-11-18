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
	define('DEF_WEBPATH', '/lazaruswebsite/new');
	
	/**
	 * Root path without final separator
	 */
	define('DEF_ABSPATH', dirname(__FILE__));

	require_once('common.php');
	
	$cfg = new Config(DEF_ABSPATH.DS.'config.php');
	$app = new Application($cfg);
	$app->run();

?>