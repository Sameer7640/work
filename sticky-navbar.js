jQuery(document).ready(function() {
	//Enter Your Class or ID
	var $stickyMenu = jQuery('.whb-header');
	
   	var stickyNavTop = jQuery($stickyMenu).offset().top;
   	
	var stickyNav = function(){
	    var scrollTop = jQuery(window).scrollTop();
	    if (scrollTop > stickyNavTop) { 
	        jQuery($stickyMenu).addClass('whb-sticked');
	    } else {
	        jQuery($stickyMenu).removeClass('whb-sticked');
	    }
	};

	stickyNav();

	jQuery(window).scroll(function() {
		stickyNav();
	});
});