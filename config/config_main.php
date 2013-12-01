<?php

	return array(
		
		// SourceForge URL for project
		'sfbaseurl' => 'http://sourceforge.net/projects/lazarus/',
		
		// SourceForgeHelper version, possible values:
		// 'auto'                                - automatically determine latest version
		// array('laz' => 'aaa', 'fpc' => 'bbb') - specify version directly (replace aaa and bbb accordingly)
		'sfversion' => 'auto',
		
		// SourceForgeHelper cache timeout
		'sfversionttl' => '1 hour',
		
		// Default website title
		'deftitle' => 'Lazarus Homepage',
		
		// Enable URL rewriting or not
		'rewrite' => true,
		
		// Disallow access to these paths
		'forbidden' => array(
			'/classes',
			'/config',
			'/pages'
		),
	);