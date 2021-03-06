<?php Page()->add_css('css/style.css', 'modified'); ?>
<?php Page()->add_css('css/mobile.css', 'modified', '(max-width: 640px)'); ?>
<?php $bs = new BrowserSniffer(); ?>
<?php $cfg = Application()->get_config(); ?>
<?php $smf = new SimpleMachinesForumHelper($cfg, true); ?>
<?php $annurl = $cfg->get('smf.index').'/board,'.$cfg->get('smf.board_announcements').'.0.html'; ?>

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
			<p><a href="<?php e_esc_html($cfg->get($bs->get_linkpath())); ?>" id="dl_btn" class="download_btn"> </a></p>
			<p class="small">
				<?php e_esc_html($bs->get_fullstring()); ?> |
				<a id="dl_menu_link" href="<?php echo Page()->get_url('downloads'); ?>">Other?</a>
			</p>
			<div id="dl_menu" class="dl_menu" style="display: none;">
				<ul><?php
					foreach((array)$cfg->get('menus.download') as $main_items){
						foreach($main_items as $sub_items){
							foreach($sub_items as $item){
								echo '<li><a href="'.esc_html($item['url']).'">'.$item['desc'].'</a></li>';
							}
						}
						echo '<hr/>';
					}
					echo '<li><a href="'.Page()->get_url('downloads').'">Other Downloads and mirrors</a></li>';
				?></ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="contentwrap">

	<div class="contentsection">
		<div class="table_wrap">
			<div>
				<div class="column_wrap33">
					<div class="column_inner">
						<h2>What is Lazarus?</h2>
						<p>Lazarus is a Delphi compatible cross-platform IDE for Rapid Application Development. It has variety of components ready for use and a graphical form designer to easily create complex graphical user interfaces.</p>
						<p class="content_more small">
							<span><a href="<?php echo Page()->get_url('about'); ?>" class="btlink">Learn more...</a></span>
							<span><a href="http://en.wikipedia.org/wiki/Lazarus_%28IDE%29">Wikipedia</a></span>
						</p>
					</div>
				</div>

				<div class="column_wrap33">
					<div class="column_inner">
						<h2>What can it do?</h2>
						<p>You can create your own open source or commercial applications. With Lazarus you can create file browsers, image viewers, database applications, graphics editing software, games, 3D software, medical analysis software or any other type of software.</p>
						<p class="content_more small">
							<span><a href="http://wiki.freepascal.org/Lazarus_Application_Gallery" class="btlink">See Application Gallery</a></span>
							<span><a href="<?php echo Page()->get_url('whyuse'); ?>">Why use it?</a></span>
						</p>
					</div>
				</div>

				<div class="column_wrap33">
					<div class="column_inner">
						<h2>Where to learn?</h2>
						<p>Lazarus has a huge community of people supporting each other. It include scientists and students, pupils and teachers, professionals and hobbyists. Our wiki provides tutorials, documentations and ideas. Our forums and mailing-list offer a space to ask questions and talk to users and the developers.</p>
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
		<div>
			<div class="column_wrap66">
				<div class="column_inner">
					<div class="contentsection">
						<div class="contentbox">
							<h2 class="contentbox_h2">Recent Announcements</h2>
							<div class="contentbox_white contentfeed">
								<?php foreach($smf->get_announcements() as $item){ ?>
									<a href="<?php e_esc_html($item->href) ?>">
										<div class="contentfeed_item">
											<h2><?php e_esc_html(trim($item->subject, '.')); ?> &mdash; <?php e_esc_html($item->time); ?></h2>
											<div class="indent">
												<p style="display: inline;"> <?php echo str_replace('...', '&hellip;', esc_html($item->preview)); ?> </p>
												<span class="small contentfeed_more">Learn more&hellip;</span>
											</div>
										</div>
									</a>
								<?php } ?>
							</div>
							<p class="contentboxmore small"><a href="<?php e_esc_html($annurl); ?>">More Announcements&hellip;</a></p>
						</div>
					</div>
					
					<div class="contentsection">
						<div class="contentbox contentbox_grey randproj">
							<div class="table_wrap">
								<div>
									<div class="column_wrap33">
										<div class="column_inner">
											<div class="randproj_note">
												<h2>Random Project</h2>
												<p class="content_more">from our 
													<a href="http://wiki.freepascal.org/Lazarus_Application_Gallery">showcase</a>.<br />
													This is an example of what can be done with Lazarus
												</p>
											</div>
										</div>
									</div>
									<div class="column_wrap66">
										<div class="column_inner">
											<p class="randproj_text">
												<?php $rid = array_rand($cfg->get_keys('projects'), 1); ?>
												<img src="<?php e_esc_html($cfg->get("projects.$rid.img")); ?>"
													 alt="<?php e_esc_html($cfg->get("projects.$rid.ttl")); ?>"
													 title="<?php e_esc_html($cfg->get("projects.$rid.ttl")); ?>" />
												<?php echo $cfg->get("projects.$rid.txt"); ?>
												<span class="content_more" style="float:right; margin-left:10px;" >
													<a href="<?php e_esc_html($cfg->get("projects.$rid.url")); ?>" >Visit project homepage</a>
												</span>
											</p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>


					<div class="contentsection">
						<div class="contentbox contentbox_grey tipofday">
							<div class="table_wrap">
								<div>
									<?php $rid = array_rand($cfg->get_keys('tips'), 1); ?>
									<div class="column_wrap33">
										<div class="column_inner">
											<h2><strong>Tip of the day: </strong></h2>
											<p><?php echo $cfg->get("tips.$rid.txt"); ?></p>
										</div>
									</div>
									<div class="column_wrap66">
										<div class="column_inner">
											<img src="<?php e_esc_html($cfg->get("tips.$rid.img")); ?>" alt=""/>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="column_wrap33">
				<div class="column_inner">

					<div class="contentsection">
						<div class="contentbox" >
							<h2 class="contentbox_h2">Highlights</h2>
							<div class="contentbox_white contentfeed_bullets" >
								<ul>
									<?php foreach($cfg->get('highlights') as $item){ ?>
										<li><?php echo $item; ?></li>
									<?php } ?>
								</ul>
							</div>
							<p  class="contentboxmore small"><a href="<?php echo Page()->get_url('features'); ?>" >Learn more&hellip;</a></p>
						</div>
					</div>

					<div class="contentsection">
						<div class="contentbox" >
							<h2 class="contentbox_h2">Recent Forum Posts</h2>
							<div class="contentbox_white" >
								<?php foreach($smf->get_recent_posts() as $item){ ?>
									<div class="contentfeed_small_item">
										<a href="<?php e_esc_html($item->href); ?>" title="<?php e_esc_html($item->subject); ?>">
											<div>
												<p <?php if($item->new)echo 'class="new"'; ?>>
													<strong><?php echo str_replace('...', '&hellip;', esc_html($item->short_subject)); ?></strong><br />
												</p>
												<p class="contentfeed_small_light small">
													<span>by <?php e_esc_html($item->poster_name); ?></span>
													<span>(<?php e_esc_html($item->time); ?>)</span>
												</p>
											</div>
										</a>
									</div>
								<?php } ?>
							</div>
							<p  class="contentboxmore small"><a href="<?php e_esc_html($cfg->get('smf.home')); ?>" >See all posts&hellip;</a></p>
						</div>
					</div>


				</div></div>
			<div class="clear"></div>
		</div>
		
	</div>

	<div class="clear"></div>
	
	<div class="spacious_block">
		<div>
			<?php foreach(Application()->get_config()->get_keys('menus.home') as $i => $section){ ?>
				<div class="column_wrap25">
					<div class="column_inner_w">
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
		<div>
				<?php } ?>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>

</div>

<?php Page()->add_js('js/jquery.min.js', '1.10.2', false); ?>
<?php Page()->add_js('js/script.js', 'modified', false); ?>
