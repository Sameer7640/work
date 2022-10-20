if(jQuery(window).width() < 992)
{
	jQuery(".scroll-down-btn").click(function(event){
		jQuery('html, body').animate({scrollTop: '+=500px'}, 800);
	});

} else {
   jQuery(".scroll-down-btn").click(function(event){
		jQuery('html, body').animate({scrollTop: '+=200px'}, 800);
	});
}



// SCROLL TOP
jQuery(".scrollTop").click(function(event){
	jQuery('html, body').animate({scrollTop: '0px'}, 800);
});