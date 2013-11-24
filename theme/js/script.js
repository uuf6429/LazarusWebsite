
jQuery(document).ready(function(){
	
	// home download menu
	jQuery('#dl_menu_link').html('Other &#x25BC;')
		.click(function(e){
			// do not navigate
			e.preventDefault();
			e.stopPropagation();
			
			// show menu
			jQuery('#dl_menu').finish().show();
			
			// hide menu when document is clicked the next time
			jQuery(document).one('click', function(){
				jQuery('#dl_menu').fadeOut('fast');
			});
		});
	
	// hide debug bar
	jQuery('#debug_bar a.close').click(function(){
		jQuery('#debug_bar').hide();
	});
	
});
