
jQuery(document).ready(function(){
	
	var locked = false;
	
	// home download menu
	jQuery('#dl_menu_link').html('Other &#x25BC;')
		.mousedown(function(){
			locked = true;
		})
		.mouseup(function(){
			jQuery('#dl_menu').stop(true, true).show();
			locked = false;
		}).click(function(e){
			e.preventDefault();
			e.stopPropagation();
		});
	
	// hide menu
	jQuery(document).mousedown(function(){
		if (!locked) jQuery('#dl_menu').stop(true, true).fadeOut();
	});
	
});
