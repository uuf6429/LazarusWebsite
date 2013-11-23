<?php Page()->add_css('css/nice_r.css', '2.0'); ?>
<?php Page()->add_css('css/style.css', 'modified'); ?>

<?php Page()->set_title('Error!!1'); ?>

<?php $e = Page()->get_error(); ?>

<div class="error">
	<h2><?php e_esc_html(get_class($e).': '.$e->getCode()); ?></h2>
	<p><?php e_esc_html($e->getMessage()); ?></p>
	<?php if(Application()->get_config()->get('debug')){ ?>
		<div class="error_debug">
			<h3>Error Location</h3>
			<pre><?php e_esc_html(str_replace(DEF_ABSPATH, '%DOC_ROOT%', $e->getFile()).':'.$e->getLine()); ?></pre>
			<br/>
			<?php if($e instanceof ContextErrorException){ ?>
				<div class="error_debug_context">
					<h3>Context Variables</h3><?php
					if(count($e->getContext())){
						$n = new Nicer($e->getContext());
						$n->render();
					}else{
						?><i>None Available</i><?php
					}
				?></div>
				<br/>
			<?php } ?>
			<div class="error_debug_trace">
				<h3>Debug Backtrace</h3>
				<table>
					<thead>
						<tr>
							<th>Function</th>
							<th>Arguments</th>
							<th>Location</th>
						</tr>
					</thead>
					<tbody><?php
						foreach($e->getTrace() as $i=>$item){
							?><tr>
								<td valign="top"><?php
									if(isset($item['class']) && isset($item['type']))
										echo $item['class'].$item['type'];
									echo $item['function'];
								?></td>
								<td valign="top"><?php
									if(isset($item['args'])){
										?><a href="javascript:;" onclick="jQuery(this).next().toggle();"><?php echo count(($item['args'])); ?> Arguments </a>
										<div style="display:none;"><?php
											if(count($item['args'])){
												$n = new Nicer($item['args']);
												$n->render();
											}
										?></div><?php
									}else{
										?><i>None</i><?php
									}
								?></td>
								<td valign="top"><?php
									if(isset($item['file'])){
										?><a href="javascript:;" title="<?php e_esc_html($item['file']); ?>">
											<?php e_esc_html(basename($item['file']).':'.$item['line']); ?>
										</a><?php
									}else echo 'Unknown';
								?></td>
							</tr><?php
						}
					?></tbody>
				</table>
			</div>
			<br/>
		</div>
	<?php } ?>
</div>

<?php Page()->add_js('js/jquery.min.js', '1.10.2', false); ?>
<?php Page()->add_js('js/nice_r.js', '2.0', false); ?>
<?php Page()->add_js('js/script.js', 'modified', false); ?>