<?php Page()->set_title('Error!!1'); ?>

<?php $e = Page()->get_error(); ?>

<div class="error">
	<h2><?php e_esc_html(get_class($e)); ?></h2>
	<p><?php e_esc_html($e->getMessage()); ?></p>
	<pre><?php e_esc_html(str_replace(DEF_ABSPATH, '%DOC_ROOT%', $e->getFile()).':'.$e->getLine()); ?></pre>
</div>