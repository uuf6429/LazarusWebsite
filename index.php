<?php

	require_once('common.php');
	
	// instantiate classes
	$evp = new EnvVarProvider();
	$cfg = new Config($evp);
	$sfc = new SourceForgeHelper($cfg);
	
	// set up virtual environment variables
	$evp->add_call('LAZ_VERSION', array($sfc, 'get_laz_version'));
	$evp->add_call('FPC_VERSION', array($sfc, 'get_fpc_version'));
	
	// load config
	$cfg->load_multi(glob(DEF_ABSPATH.DS.'config'.DS.'config*.php'), $evp);
	
	// load and run application
	$app = new Application($cfg);
	$app->run();

