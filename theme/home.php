<?php Page()->add_css('css/style.css', 'modified'); ?>

<div class="slidewrap_bg">
	<div class="slidewrap">
		<div class="left_shot">
			<a href="http://wiki.lazarus.freepascal.org/Screenshots">
				<img src="<?php e_esc_html(DEF_WEBPATH.'/theme/img/homeshot_1.gif'); ?>" alt="Lazarus Screenshot" title="Lazarus IDE" />
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
			<p><a href="{ $platform_download_link }" id="dl_btn" class="download_btn"> </a></p>
			<p class="small">
				{ $platform_download_for } 
				| <a id="dl_menu_link" href="<?php echo Page()->get_url('downloads'); ?>">Other?</a>
			</p>
			<div id="dl_menu" class="dl_menu" style="display: none;">
				<?php echo Page()->get_menu('menus.download', 'lists'); ?>
				<!--ul>
					<li><a href="{ $dl_win32_url }">Windows 32 Bits</a></li>
					<li><a href="{ $dl_win64_url }">Windows 64 Bits</a></li>
					<hr />
					<li><a href="{ $dl_deb32_url }">Linux DEB 32 Bits</a></li>
					<li><a href="{ $dl_deb64_url }">Linux DEB 64 Bits</a></li>
					<li><a href="{ $dl_rpm32_url }">Linux RPM 32 Bits</a></li>
					<li><a href="{ $dl_rpm64_url }">Linux RPM 64 Bits</a></li>
					<hr />
					<li><a href="{ $dl_mac32_url }">Mac OS X 32 Bits</a></li>
					<li><a href="{ $dl_macppc_url }">Mac OS X Powerpc</a></li>
					<hr />
					<li><a href="<?php echo Page()->get_url('downloads'); ?>">Other Downloads and mirrors</a></li>
				</ul-->
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="contentwrap">

	<div class="contentsection">
		<div class="table_wrap"><div style="width:100%;">
				<div class="column_wrap33">
					<div class="columnn_inner">
						<h2>What is Lazarus?</h2>
						<p>Lazarus is a Delphi compatible cross-platform IDE for Rapid Application Development. It has variety of components ready for use and a graphical form designer to easily create complex graphical user interfaces.</p>
						<p class="content_more small"><span><a href="<?php echo Page()->get_url('about'); ?>" class="btlink">Learn more...</a></span>
							<span><a href="http://en.wikipedia.org/wiki/Lazarus_%28IDE%29">Wikipedia</a></span></p>
					</div>
				</div>

				<div class="column_wrap33">
					<div class="columnn_inner">
						<h2>What can it do?</h2>
						<p>You can create your own open source or commercial applications. With Lazarus you can create file browsers, image viewers, database applications, graphics editing software, games, 3D software, medical analysis software or any other type of software.</p>
						<p class="content_more small">
							<span><a href="http://wiki.freepascal.org/Lazarus_Application_Gallery" class="btlink">See Application Gallery</a></span>
							<span><a href="<?php echo Page()->get_url('whyuse'); ?>">Why use it?</a></span>
						</p>
					</div>
				</div>

				<div class="column_wrap33">
					<div class="columnn_inner">
						<h2>Where to learn?</h2>
						<p>Lazarus has a huge community of people supporting each other. It include scientists and students, pupils and teachers, professionals and hobbyists. Our wiki provides tutorials, documentations and ideas. Our forums and mailing-list offer a space to ask questions and talk to users and the developers.
						</p>
						<p class="content_more small">
							<span><a href="http://wiki.freepascal.org/Lazarus_Tutorial" class="btlink">Start Learning</a></span>
							<span><a href="http://wiki.freepascal.org/Pascal_and_Lazarus_Books_and_Magazines">Books</a> | <a href="http://wiki.freepascal.org/Lazarus_Documentation#Lazarus_and_Pascal_Tutorials">Online Tutorials</a></span>
						</p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>




	<div class="table_wrap">
		<div style="width:100%;">
			<div class="column_wrap66"><div class="columnn_inner">
					<div class="contentsection">
						<div class="contentbox">
							<h2 class="contentbox_h2">Recent Announcements</h2>
							<div class="contentbox_white contentfeed">
								{ for start=0 stop=4 step=1 value=i }
								<a href="{ $recent_annc_array[$i].href }"><div class="contentfeed_item">
										<h2>{ $recent_annc_array[$i].subject } - { $recent_annc_array[$i].time }</h2>
										<div class="indent">
											<p style="display: inline;"> { $recent_annc_array[$i].preview } </p>
											<span class="small contentfeed_more" > Learn more...</span>
										</div>
									</div></a>
								{ /for }
							</div>
							<p class="contentboxmore small"><a href="{ $smf_index }/board,{ $smf_announcements_board }.0.html" >More Announcements...</a></p>
						</div>
					</div>



					<div class="contentsection">
						<div class="contentbox contentbox_grey randproj">
							<div class="table_wrap"><div style="width:100%;">
									<div class="column_wrap33"><div class="columnn_inner">
											<div class="randproj_note">
												<h2>Random Project</h2>
												<p  class="content_more">from our 
													<a href="http://wiki.freepascal.org/Lazarus_Application_Gallery">showcase</a>.<br />
													This is an example of what can be done with Lazarus
												</p>
											</div>
										</div></div>
									<div class="column_wrap66"><div class="columnn_inner">
											<p class="randproj_text">
												<img src="randproj/{ $rand_proj_img }" alt="{ $rand_proj_title }" title="{ $rand_proj_title }" height="70" />
												{ $rand_proj_desc }

												<span class="content_more" style="float:right;margin-left:10px;" >
													<a href="{ $rand_proj_link }" >Visit project homepage</a>
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
											<p>{ $tip_of_the_day_desc }</p>
										</div></div>
									<div class="column_wrap66"><div class="columnn_inner">
											<img width="100%" src="{ $tip_of_the_day_img }"</img>
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
							<p  class="contentboxmore small"><a href="<?php echo Page()->get_url('features'); ?>" >Learn more...</a></p>
						</div>
					</div>



					<div class="contentsection">
						<div class="contentbox" >
							<h2 class="contentbox_h2">Recent Forum Posts</h2>
							<div class="contentbox_white" >
								{ for start=0 stop=8 step=1 value=i }
								<div class="contentfeed_small_item"><a href="{ $recent_posts_array[$i].href }" title="{ $recent_posts_array[$i].subject }">
										<div>
											<p {if $recent_posts_array[$i].new eq "True"}class="new"{/if}>
												<strong>{ $recent_posts_array[$i].short_subject }</strong><br />
											</p>
											<p class="contentfeed_small_light small">
												<span>by { $recent_posts_array[$i].poster.name }</span>
												<span>({ $recent_posts_array[$i].time })</span>
											</p>
										</div>
									</a></div>
								{ /for }
							</div>
							<p  class="contentboxmore small"><a href="{ $smf_home }" >See all posts...</a></p>
						</div>
					</div>


				</div></div>
			<div class="clear"></div>
		</div>
		
	</div>

	<div class="clear"></div>
	
	<div class="spacious_block">
		<div style="width:100%;">
			<?php foreach(Application()->get_config()->get_keys('menus.home') as $i => $section){ ?>
				<div class="column_wrap25">
					<div class="columnn_inner_w">
						<div class="hblock2">
							<h3><?php e_esc_html($section); ?></h3>
							<?php echo Page()->get_menu("home.$section", 'lists'); ?>
						</div>
					</div>
				</div>
				<?php if(($i + 1) % 4 == 0){ ?>
				<div class="clear"></div>
		</div>
	</div>
	<div class="spacious_block">
		<div style="width:100%;">
				<?php } ?>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>

	<!--div class="spacious_block"><div style="width:100%;">

			<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
						<h3>Lazarus / <span>Free Pascal</span></h3>
						<ul>
							<li><a href="{ $home_php_name }?page=features">Features</a></li>
							<li><a href="{ $home_php_name }?page=whyuse">Why use it?</a></li>
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
							<li><a href="">Projects Using Lazarus</a></li>
							<li><a href="">Apps created with Lazarus</a></li>
							<li><a href="">Apps created with Free Pascal</a></li>
							<li><a href="">Case Studies</a></li>
						</ul>
					</div></div></div>

			<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
						<h3>Download</h3>
						<ul>
							<li><a href="">Stable Versions</a></li>
							<li><a href="">Daily Snapshots</a></li>
							<li><a href="">Source code</a></li>
							<li><a href="">Other Distributions</a></li>
						</ul>
					</div></div></div>

			<div class="clear"></div>
		</div></div>
	<div class="spacious_block"><div style="width:100%;">
			<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
						<h3>Community</h3>
						<ul>
							<li><a href="{ $smf_home }">Forum</a></li>
							<li><a href="">Wiki</a></li>
							<li><a href="">Bugtracker</a></li>
							<li><a href="">IRC Channel</a></li>
							<li><a href="">Developer Blog</a></li>
							<li><a href="">Mailing Lists</a></li>
							<li><a href="">Follow us on Twitter</a></li>
						</ul>
					</div></div></div>

			<div class="column_wrap25"><div class="columnn_inner_w"><div class="hblock2">
						<h3>Education</h3>
						<ul>
							<li><a href="">Documentation</a></li>
							<li><a href="">Wiki</a></li>
							<li><a href="">Books and Journals</a></li>
							<li><a href="">Developer Blog</a></li>
							<li><a href="">In other languages</a></li>
							<li><a href="">Events</a></li>
							<li><a href="">Contests</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="column_wrap25">
				<div class="columnn_inner_w">
					<div class="hblock2">
						<h3>Service</h3>
						<ul>
							<li><a href="{ $home_php_name }?page=contact">Contact Us</a></li>
							<li><a href="">Legal Information</a></li>
							<li><a href="">Privacy Policy</a></li>
							<li><a href="">Open Positions</a></li>
							<li><a href="">Bounties</a></li>
							<li><a href="">The Lazarus Guide</a></li>
							<li><a href="">Donate</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="clear"></div>
		</div>
	</div-->
</div>

<?php Page()->add_js('js/jquery-1.7.1.min.js', '1.7.1', false); ?>
<?php Page()->add_js('js/script.js', 'modified', false); ?>
