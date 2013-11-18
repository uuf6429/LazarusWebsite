<?php

	return array(
		'rewrite' => true,
		'menus' => array(
			'header' => array(
				array('url' => 'page:', 'text' => 'Home'),
				array('url' => 'page:about', 'text' => 'About'),
				array('url' => 'http://wiki.lazarus.freepascal.org/Screenshots', 'text' => 'Screenshots'),
				array('url' => 'http://wiki.lazarus.freepascal.org/Lazarus_Faq', 'text' => 'FAQ'),
				array('url' => 'page:features', 'text' => 'Features'),
				array('url' => 'page:downloads', 'text' => 'Downloads'),
				array('url' => 'http://forum.lazarus.freepascal.org/index.php?action=forum', 'text' => 'Forum'),
				array('url' => 'http://wiki.freepascal.org/', 'text' => 'Wiki'),
			),
			'footer' => array(
				array('id' => 'footer_logo_fp', 'url' => 'http://www.freepascal.org'),
				array('id' => 'footer_logo_sf', 'url' => 'http://sourceforge.net/projects/lazarus'),
				array('id' => 'footer_logo_ol', 'url' => 'http://www.ohloh.net/p/lazarus?ref=sample'),
			),
		),
	);