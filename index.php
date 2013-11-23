<?php

	require_once('common.php');
	
	// initialize chronometer and counters
	$ch = new Chronometer();
	$ch->add_counter('memory_usage', Chronometer::UNIT_DATA_SIZE, 'memory_get_usage');
	$ch->add_counter('memory_peak', Chronometer::UNIT_DATA_SIZE, 'memory_get_peak_usage');
	$ch->add_counter('time_taken', Chronometer::UNIT_TIME_SEC, 'microtime', array(true));
	$ch->take_sample();
	
	// instantiate classes
	$evp = new EnvVarProvider();
	$cfg = new Config($evp);
	$sfc = new SourceForgeHelper($cfg);
	
	// set up virtual environment variables
	$evp->add_value('DS', DS);
	$evp->add_value('UPLOADS_URL', DEF_WEBPATH.'/uploads');
	$evp->add_value('UPLOADS_DIR', DEF_ABSPATH.DS.'uploads');
	$evp->add_call('LAZ_VERSION', array($sfc, 'get_laz_version'));
	$evp->add_call('FPC_VERSION', array($sfc, 'get_fpc_version'));
	
	// load config
	$cfg->load_multi(glob(DEF_ABSPATH.DS.'config'.DS.'config*.*'), $evp);
	
	// load and run application
	$app = new Application($cfg);
	$app->run();

