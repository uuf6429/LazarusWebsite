<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-11-17 22:49:56 W. Europe Standard Time */ ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $this->_vars['page_title']; ?>
</title>
	<meta name="description" content="<?php echo $this->_vars['page_meta_description']; ?>
" />
	<meta name="keywords" content="<?php echo $this->_vars['page_meta_keywords']; ?>
" />
	<meta name="author" content="<?php echo $this->_vars['page_author']; ?>
" />
	<meta name="copyright" content="Lazarus" />

	<link rel="stylesheet" type="text/css" href="<?php echo $this->_vars['theme_path']; ?>
style.css" />
<?php if ($this->_vars['ishome'] == "True"): ?>
	<script type="text/javascript" src="<?php echo $this->_vars['theme_path']; ?>
script_home.js"></script>
<?php endif; ?>
	<script type="text/javascript" src="<?php echo $this->_vars['theme_path']; ?>
script.js"></script>
	
<?php echo $this->_vars['extra_head_content']; ?>


</head>
<body>

<div class="pagewrap">

  <div class="top_bar">
	<div class="top_logo_bg">
		<div class="top_logo">
			<a href="<?php echo $this->_vars['home_php_name']; ?>
"><img src="<?php echo $this->_vars['theme_path']; ?>
images/top_logo.png" alt="Lazarus" /></a>
		</div>
		<div class="top_links">
			<a href="<?php echo $this->_vars['home_php_name']; ?>
">Home</a>
			<a href="<?php echo $this->_vars['home_php_name']; ?>
?page=about">About</a>
			<a href="http://wiki.lazarus.freepascal.org/Screenshots">Screenshots</a>
			<a href="http://wiki.lazarus.freepascal.org/Lazarus_Faq">FAQ</a>
			<a href="<?php echo $this->_vars['home_php_name']; ?>
?page=features">Features</a>
			<a href="<?php echo $this->_vars['home_php_name']; ?>
?page=downloads">Downloads</a>
			<a href="<?php echo $this->_vars['smf_home']; ?>
">Forum</a>
			<a href="http://wiki.freepascal.org/">Wiki</a>
		</div>
		<div class="clear"></div>
	</div>
  </div>
  <div class="top_sep">&nbsp;</div>

<?php if ($this->_vars['ishome'] == "True"): ?>

  <div class="slidewrap_bg">
  <div class="slidewrap">
	<div class="left_shot">
		<a href="http://wiki.lazarus.freepascal.org/Screenshots">
			<img src="<?php echo $this->_vars['theme_path']; ?>
images/homeshot_1.gif" alt="Lazarus Screenshot" title="Lazarus IDE" />
		</a>
	</div>
	<div class="slider_r">
		<h1>Lazarus</h1>
		<h2>The professional Free Pascal RAD IDE</h2>
		<ul class="right">
			<li>Cross platform</li>
			<li>Drag &amp; Drop Form Designer</li>
			<li>Open source (GPL/LGPL)</li>
			<li>Delphi converter</li>
		</ul>
		<!--<p><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=downloads" id="dl_btn" class="download_btn">Download</a></p>-->
		<p><a href="<?php echo $this->_vars['platform_download_link']; ?>
" id="dl_btn" class="download__btn"><img src="<?php echo $this->_vars['theme_path']; ?>
images/download_btn.gif" alt="Download" /></a></p>
		<p class="small"><?php echo $this->_vars['platform_download_for']; ?>
 
			<script>GetDlOSName();</script>
			<noscript>| <a href="<?php echo $this->_vars['home_php_name']; ?>
?page=downloads">Other?</a></noscript>
		</p>
		<div id="dl_menu" class="dl_menu" style="display:none;">
			<ul>
				<li><a href="<?php echo $this->_vars['dl_win32_url']; ?>
">Windows 32 Bits</a></li>
				<li><a href="<?php echo $this->_vars['dl_win64_url']; ?>
">Windows 64 Bits</a></li>
				<hr />
				<li><a href="<?php echo $this->_vars['dl_deb32_url']; ?>
">Linux DEB 32 Bits</a></li>
				<li><a href="<?php echo $this->_vars['dl_deb64_url']; ?>
">Linux DEB 64 Bits</a></li>
				<li><a href="<?php echo $this->_vars['dl_rpm32_url']; ?>
">Linux RPM 32 Bits</a></li>
				<li><a href="<?php echo $this->_vars['dl_rpm64_url']; ?>
">Linux RPM 64 Bits</a></li>
				<hr />
				<li><a href="<?php echo $this->_vars['dl_mac32_url']; ?>
">Mac OS X 32 Bits</a></li>
				<li><a href="<?php echo $this->_vars['dl_macppc_url']; ?>
">Mac OS X Powerpc</a></li>
				<hr />
				<li><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=downloads">Other Downloads and mirrors</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
  </div>
  </div>
	
  <div class="contentwrap">

	<div class="contentsection">
	<div class="table_wrap"><div style="width:100%;">
		<div class="column_wrap33"><div class="columnn_inner">
			<h2>What is Lazarus?</h2>
			<p>Lazarus is a Delphi compatible cross-platform IDE for Rapid Application Development. It has variety of components ready for use and a graphical form designer to easily create complex graphical user interfaces.</p>
			<p class="content_more small"><span><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=about" class="btlink">Learn more...</a></span>
			<span><a href="http://en.wikipedia.org/wiki/Lazarus_%28IDE%29">Wikipedia</a></span></p>
		</div></div>
	
		<div class="column_wrap33"><div class="columnn_inner">
			<h2>What can it do?</h2>
			<p>You can create your own open source or commercial applications. With Lazarus you can create file browsers, image viewers, database applications, graphics editing software, games, 3D software, medical analysis software or any other type of software.</p>
			<p class="content_more small">
				<span><a href="http://wiki.freepascal.org/Lazarus_Application_Gallery" class="btlink">See Application Gallery</a></span>
				<span><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=whyuse">Why use it?</a></span>
			</p>
		</div></div>
	
		<div class="column_wrap33"><div class="columnn_inner">
			<h2>Where to learn?</h2>
			<p>Lazarus has a huge community of people supporting each other. It include scientists and students, pupils and teachers, professionals and hobbyists. Our wiki provides tutorials, documentations and ideas. Our forums and mailing-list offer a space to ask questions and talk to users and the developers.
			</p>
			<p class="content_more small">
				<span><a href="http://wiki.freepascal.org/Lazarus_Tutorial" class="btlink">Start Learning</a></span>
				<span><a href="http://wiki.freepascal.org/Pascal_and_Lazarus_Books_and_Magazines">Books</a> | <a href="http://wiki.freepascal.org/Lazarus_Documentation#Lazarus_and_Pascal_Tutorials">Online Tutorials</a></span>
			</p>
		</div></div>
		<div class="clear"></div>
	</div>
	</div></div>
	

	

	<div class="table_wrap"><div style="width:100%;">
	<div class="column_wrap66"><div class="columnn_inner">
		<div class="contentsection">
			<div class="contentbox">
				<h2 class="contentbox_h2">Recent Announcements</h2>
				<div class="contentbox_white contentfeed">
					<?php for($for1 = 0; ((0 < 4) ? ($for1 < 4) : ($for1 > 4)); $for1 += ((0 < 4) ? 1 : -1)):  $this->assign('i', $for1); ?>
					<a href="<?php echo $this->_vars['recent_annc_array'][$this->_vars['i']]['href']; ?>
"><div class="contentfeed_item">
						<h2><?php echo $this->_vars['recent_annc_array'][$this->_vars['i']]['subject']; ?>
 - <?php echo $this->_vars['recent_annc_array'][$this->_vars['i']]['time']; ?>
</h2>
						<div class="indent">
							<p style="display: inline;"> <?php echo $this->_vars['recent_annc_array'][$this->_vars['i']]['preview']; ?>
 </p>
							<span class="small contentfeed_more" > Learn more...</span>
</div>
					</div></a>
					<?php endfor; ?>
				</div>
				<p class="contentboxmore small"><a href="<?php echo $this->_vars['smf_index']; ?>
/board,<?php echo $this->_vars['smf_announcements_board']; ?>
.0.html" >More Announcements...</a></p>
			</div>
		</div>



		<div class="contentsection">
			<div class="contentbox contentbox_grey randproj">
				<div class="table_wrap"><div style="width:100%;">
					<div class="column_wrap33"><div class="columnn_inner">
						<div class="randproj_note">
							<h2>Random Project</h2>
							<p  class="content_more">from our 
							<a href="http://wiki.freepascal.org/Lazarus_Application_Gallery">showcase</a>
							.<br />
							This is an example of what can be done with Lazarus</p>
						</div>
					</div></div>
					<div class="column_wrap66"><div class="columnn_inner">
						<p class="randproj_text">
							<img src="randproj/<?php echo $this->_vars['rand_proj_img']; ?>
" alt="<?php echo $this->_vars['rand_proj_title']; ?>
" title="<?php echo $this->_vars['rand_proj_title']; ?>
" height="70" />
							<?php echo $this->_vars['rand_proj_desc']; ?>


							<span class="content_more" style="float:right;margin-left:10px;" >
							<a href="<?php echo $this->_vars['rand_proj_link']; ?>
" >Visit project homepage</a>
							</span>
						</p>
					</div></div>
					<div class="clear"></div>
				</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>


		<div class="contentsection">
			<div class="contentbox contentbox_grey tipofday">
				<div class="table_wrap"><div style="width:100%;">
					<div class="column_wrap33"><div class="columnn_inner">
						<h2><strong>Tip of the day: </strong></h2>
						<p><?php echo $this->_vars['tip_of_the_day_desc']; ?>
</p>
					</div></div>
					<div class="column_wrap66"><div class="columnn_inner">
						<img width="100%" src="<?php echo $this->_vars['tip_of_the_day_img']; ?>
"</img>
					</div></div>
					<div class="clear"></div>
				</div><div class="clear"></div>
				</div>
			</div>
		</div>

	</div></div>

	<div class="column_wrap33"><div class="columnn_inner">

		<div class="contentsection">
			<div class="contentbox" >
					<h2 class="contentbox_h2">Highlights</h2>
					<div class="contentbox_white contentfeed_bullets" >
						<ul>
						<li>Open Source</li>
						<li>Written in Pascal for Pascal</li>
						<li>Cross-platform</li>
						<li>Over 200 Components</li>
						<li>Many Frameworks</li>
						<li>Extendable through packages</li>
						<li>Converts from Delphi code</li>
						<li>Regular Releases</li>
						</ul>
					</div>
					<p  class="contentboxmore small"><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=features" >Learn more...</a></p>
			</div>
		</div>



		<div class="contentsection">
			<div class="contentbox" >
				<h2 class="contentbox_h2">Recent Forum Posts</h2>
				<div class="contentbox_white" >
					<?php for($for1 = 0; ((0 < 8) ? ($for1 < 8) : ($for1 > 8)); $for1 += ((0 < 8) ? 1 : -1)):  $this->assign('i', $for1); ?>
					<div class="contentfeed_small_item"><a href="<?php echo $this->_vars['recent_posts_array'][$this->_vars['i']]['href']; ?>
" title="<?php echo $this->_vars['recent_posts_array'][$this->_vars['i']]['subject']; ?>
">
						<div>
						<p <?php if ($this->_vars['recent_posts_array'][$this->_vars['i']]['new'] == "True"): ?>class="new"<?php endif; ?>>
							<strong><?php echo $this->_vars['recent_posts_array'][$this->_vars['i']]['short_subject']; ?>
</strong><br />
						</p>
						<p class="contentfeed_small_light small">
							<span>by <?php echo $this->_vars['recent_posts_array'][$this->_vars['i']]['poster']['name']; ?>
</span>
							<span>(<?php echo $this->_vars['recent_posts_array'][$this->_vars['i']]['time']; ?>
)</span>
						</p>
						</div>
					</a></div>
					<?php endfor; ?>
				</div>
				<p  class="contentboxmore small"><a href="<?php echo $this->_vars['smf_home']; ?>
" >See all posts...</a></p>
			</div>
		</div>


	</div></div>
	<div class="clear"></div>
	</div></div>


	
	<div class="clear"></div>
	
	
	
	
	<div class="spacious_block"><div style="width:100%;">

		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Lazarus / <span>Free Pascal</span></h3>
			<ul>
				<li><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=features">Features</a></li>
				<li><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=whyuse">Why use it?</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Lazarus_1.0_fixes_branch">What's New</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Screenshots">Screenshots</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Roadmap">Roadmap</a></li>
				<li><a href="http://wiki.freepascal.org/Lazarus_Faq">FAQ</a></li>
			</ul>
		</div></div></div>

		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Platforms</h3>
			<ul>
				<li><a href="http://wiki.lazarus.freepascal.org/Portal:Android">Android Development</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Portal:Linux">Lazarus for Linux</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Portal:Mac">Lazarus for Mac OS X</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Portal:iOS">Lazarus for iOS</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Portal:Windows">Lazarus for Windows</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Portal:Web_Development">Lazarus for Web</a></li>
			</ul>
		</div></div></div>
		
		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Applications</h3>
			<ul>
				<li><a href="http://wiki.freepascal.org/Projects_using_Lazarus">Projects Using Lazarus</a></li>
				<li><a href="http://wiki.freepascal.org/Lazarus_Application_Gallery">Apps created with Lazarus</a></li>
				<li><a href="http://wiki.freepascal.org/FPC_Applications/Projects_Gallery">Apps created with Free Pascal</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Case_Studies">Case Studies</a></li>
			</ul>
		</div></div></div>

		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Download</h3>
			<ul>
				<li><a href="http://sourceforge.net/project/showfiles.php?group_id=89339">Stable Versions</a></li>
				<li><a href="http://www.hu.freepascal.org/lazarus/">Daily Snapshots</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/index.php/Getting_Lazarus">Source code</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Getting_Lazarus#Lazarus_Distributions">Other Distributions</a></li>
			</ul>
		</div></div></div>
		
		<div class="clear"></div>
	</div></div>
	<div class="spacious_block"><div style="width:100%;">
		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Community</h3>
			<ul>
				<li><a href="<?php echo $this->_vars['smf_home']; ?>
">Forum</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/">Wiki</a></li>
				<li><a href="http://bugs.freepascal.org/view_all_bug_page.php?project_id=1">Bugtracker</a></li>
				<li><a href="http://www.lazarus.freepascal.org/index.php/page,9.html">IRC Channel</a></li>
				<li><a href="http://lazarus-dev.blogspot.com/">Developer Blog</a></li>
				<li><a href="http://lists.lazarus.freepascal.org/mailman/listinfo">Mailing Lists</a></li>
				<li><a href="http://twitter.com/LazarusDev">Follow us on Twitter</a></li>
			</ul>
		</div></div></div>
		
		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Education</h3>
			<ul>
				<li><a href="http://wiki.freepascal.org/Lazarus_Documentation">Documentation</a></li>
				<li><a href="http://wiki.freepascal.org/">Wiki</a></li>
				<li><a href="http://wiki.freepascal.org/Pascal_and_Lazarus_Books_and_Magazines">Books and Journals</a></li>
				<li><a href="http://lazarus-dev.blogspot.com/">Developer Blog</a></li>
				<li><a href="http://www.lazarus.freepascal.org/index.php/page,21.html">In other languages</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Conferences_and_Events">Events</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Contests">Contests</a></li>
			</ul>
		</div></div></div>
		
		<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
			<h3>Service</h3>
			<ul>
				<li><a href="<?php echo $this->_vars['home_php_name']; ?>
?page=contact">Contact Us</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/licensing">Legal Information</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Lazarus_wiki:Privacy_policy">Privacy Policy</a></li>
				<li><a href="http://www.lazarus.freepascal.org/index.php/board,41.0.html">Open Positions</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/Bounties">Bounties</a></li>
				<li><a href="http://www.blaisepascal.eu/index.php?actie=./subscribers/lazarusbookinfoEnglish">The Lazarus Guide</a></li>
				<li><a href="http://wiki.lazarus.freepascal.org/How_to_donate_to_Lazarus">Donate</a></li>
			</ul>
		</div></div></div>
		
		<div class="clear"></div>
	</div></div>
  </div>
	
	<?php else: ?>
  <div class="contentwrap">
	
		<div class="page">
		<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include($this->_vars['page_content_file'], array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		</div>
  </div>
	
	<?php endif; ?>
	
	

  <div class="footer">
		<p class="foot_left small">&copy; 1993-2013 Lazarus and Free Pascal Team</p>
		<div class="foot_right">
		<a href="http://www.freepascal.org"><img src="<?php echo $this->_vars['theme_path']; ?>
images/footer_logo.gif" height="31" /></a>
		<a href="http://sourceforge.net/projects/lazarus"><img src="<?php echo $this->_vars['theme_path']; ?>
images/footer_sf.gif" /></a>
		<a href="http://www.ohloh.net/p/lazarus?ref=sample"><img src="<?php echo $this->_vars['theme_path']; ?>
images/footer_ohloh.gif" /></a>
		</div>
  </div>

</div>

</body>
</html>
