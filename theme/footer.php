
			<?php Page()->do_footer(); ?>

			<div class="footer">
				<p class="foot_left small">&copy; 1993-<?php echo date('Y'); ?> Lazarus and Free Pascal Team</p>
				<div class="foot_right">
					<?php echo Page()->get_menu('footer'); ?>
				</div>
			</div>

		</div>
		
		<?php if(Application()->get_config()->get('debug')){ ?>
			<div id="debug_bar">
				<div class="left"><a href="javascript:;" class="close">&times;</a>DEBUG ENABLED</div>
				<div class="right"><?php Chronometer()->take_sample(); echo Chronometer()->toString(); ?></div>
			</div>
		<?php } ?>

	</body>
</html>