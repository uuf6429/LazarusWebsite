<?php Page()->add_css('css/style.css', 'modified'); ?>

<?php $content = Page()->get_content( Page()->get_name() ); ?>

<div class="contentwrap">
	<div class="page">
		<h1 class="title"><?php e_esc_html(Page()->get_title()); ?></h1>
		<?php echo $content; ?>
	</div>
</div>

<?php Page()->add_js('js/jquery.min.js', '1.10.2', false); ?>
<?php Page()->add_js('js/script.js', 'modified', false); ?>
