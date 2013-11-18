<?php Page()->add_css('css/style.css', 'modified'); ?>
<?php Page()->add_js('js/script.js', 'modified'); ?>

<div class="contentwrap">
	<div class="page">
		<?php echo Page()->render_content( Page()->get_name() ); ?>
	</div>
</div>
