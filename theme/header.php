<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php e_esc_html(Page()->get_title()); ?></title>
		<meta name="description" content="<?php e_esc_html(Page()->get_meta('description')); ?>" />
		<meta name="copyright" content="<?php e_esc_html(Page()->get_meta('copyright')); ?>" />
		<meta name="keywords" content="<?php e_esc_html(Page()->get_meta('keywords')); ?>" />
		<meta name="author" content="<?php e_esc_html(Page()->get_meta('author')); ?>" />
		
		<link rel="icon" href="<?php e_esc_html(DEF_WEBPATH.'/theme/img/favicon.ico'); ?>" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php e_esc_html(DEF_WEBPATH.'/theme/img/favicon.ico'); ?>" type="image/x-icon" />

		<?php Page()->do_header(); ?>

	</head>
	<body>

		<div class="pagewrap">

			<div class="top_bar">
				<div class="top_logo_bg">
					<div class="top_logo">
						<a class="top_logo_link" href="<?php e_esc_html(Page()->get_url('')); ?>" title="Lazarus"> </a>
					</div>
					<a class="top_links_toggle" id="top_links_link" href="javascript:;"><span>&equiv;</span></a>
					<div class="top_links" id="top_links_menu">
						<?php echo Page()->get_menu('header'); ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="top_sep">&nbsp;</div>



