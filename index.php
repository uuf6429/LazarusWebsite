<?php

	require_once('common.php');
	
	$cfg = new Config(DEF_ABSPATH.DS.'config.php');
	$app = new Application($cfg);
	$app->run();

