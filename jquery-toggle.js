jQuery(document).ready(function( $ ){
 $('.design-box-wrapper').hide();

 $('.load-btn').click(function(e) {
   e.preventDefault();
   $(this).parents('.loader-block').addClass('button-clicked');
   var link = $(this).attr('href');
   $(link).toggle();
    $('html,body').animate({
       scrollTop: $(link).offset().top -150},
       'slow');
 });
});