<?php

	return array(
		
		'deftitle' => 'Lazarus Homepage',
		
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
			
			'home' => array(
				'Lazarus / Free Pascal' => array(
					array('url' => 'page:features', 'text' => 'Features'),
					array('url' => 'page:whyuse', 'text' => 'Why use it?'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Lazarus_1.0_fixes_branch', 'text' => "What's New"),
					array('url' => 'http://wiki.lazarus.freepascal.org/Screenshots', 'text' => 'Screenshots'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Roadmap', 'text' => 'Roadmap'),
					array('url' => 'http://wiki.freepascal.org/Lazarus_Faq', 'text' => 'FAQ'),
				),
				'Platforms' => array(
					array('url' => 'http://wiki.lazarus.freepascal.org/Portal:Android', 'text' => 'Android Development'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Portal:Linux', 'text' => 'Lazarus for Linux'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Portal:Mac', 'text' => 'Lazarus for Mac OS X'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Portal:iOS', 'text' => 'Lazarus for iOS'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Portal:Windows', 'text' => 'Lazarus for Windows'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Portal:Web_Development', 'text' => 'Lazarus for Web'),
				),
				'Applications' => array(
					array('url' => 'http://wiki.freepascal.org/Projects_using_Lazarus', 'text' => 'Projects Using Lazarus'),
					array('url' => 'http://wiki.freepascal.org/Lazarus_Application_Gallery', 'text' => 'Apps created with Lazarus'),
					array('url' => 'http://wiki.freepascal.org/FPC_Applications/Projects_Gallery', 'text' => 'Apps created with Free Pascal'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Case_Studies', 'text' => 'Case Studies'),
				),
				'Download' => array(
					array('url' => 'http://sourceforge.net/project/showfiles.php?group_id=89339', 'text' => 'Stable Versions'),
					array('url' => 'http://www.hu.freepascal.org/lazarus/', 'text' => 'Daily Snapshots'),
					array('url' => 'http://wiki.lazarus.freepascal.org/index.php/Getting_Lazarus', 'text' => 'Source code'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Getting_Lazarus#Lazarus_Distributions', 'text' => 'Other Distributions'),
				),
				'Community' => array(
					array('url' => '', 'text' => 'Forum'),
					array('url' => 'http://wiki.lazarus.freepascal.org/', 'text' => 'Wiki'),
					array('url' => 'http://bugs.freepascal.org/view_all_bug_page.php?project_id=1', 'text' => 'Bugtracker'),
					array('url' => 'http://www.lazarus.freepascal.org/index.php/page,9.html', 'text' => 'IRC Channel'),
					array('url' => 'http://lazarus-dev.blogspot.com/', 'text' => 'Developer Blog'),
					array('url' => 'http://lists.lazarus.freepascal.org/mailman/listinfo', 'text' => 'Mailing Lists'),
					array('url' => 'http://twitter.com/LazarusDev', 'text' => 'Follow us on Twitter'),
				),
				'Education' => array(
					array('url' => 'http://wiki.freepascal.org/Lazarus_Documentation', 'text' => 'Documentation'),
					array('url' => 'http://wiki.freepascal.org/', 'text' => 'Wiki'),
					array('url' => 'http://wiki.freepascal.org/Pascal_and_Lazarus_Books_and_Magazines', 'text' => 'Books and Journals'),
					array('url' => 'http://lazarus-dev.blogspot.com/', 'text' => 'Developer Blog'),
					array('url' => 'http://www.lazarus.freepascal.org/index.php/page,21.html', 'text' => 'In other languages'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Conferences_and_Events', 'text' => 'Events'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Contests', 'text' => 'Contests'),
				),
				'Service' => array(
					array('url' => 'page:contact', 'text' => 'Contact Us'),
					array('url' => 'http://wiki.lazarus.freepascal.org/licensing', 'text' => 'Legal Information'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Lazarus_wiki:Privacy_policy', 'text' => 'Privacy Policy'),
					array('url' => 'http://www.lazarus.freepascal.org/index.php/board,41.0.html', 'text' => 'Open Positions'),
					array('url' => 'http://wiki.lazarus.freepascal.org/Bounties', 'text' => 'Bounties'),
					array('url' => 'http://www.blaisepascal.eu/index.php?actie=./subscribers/lazarusbookinfoEnglish', 'text' => 'The Lazarus Guide'),
					array('url' => 'http://wiki.lazarus.freepascal.org/How_to_donate_to_Lazarus', 'text' => 'Donate'),
				),
			),
			
			'footer' => array(
				array('id' => 'footer_logo_fp', 'url' => 'http://www.freepascal.org'),
				array('id' => 'footer_logo_sf', 'url' => 'http://sourceforge.net/projects/lazarus'),
				array('id' => 'footer_logo_ol', 'url' => 'http://www.ohloh.net/p/lazarus?ref=sample'),
			),
			
		),
		
	);