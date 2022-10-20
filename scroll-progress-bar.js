function progressBarScroll() {
  let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
      height = document.documentElement.scrollHeight - document.documentElement.clientHeight,
      scrolled = (winScroll / height) * 100;
  document.getElementById("line-scroll").style.width = scrolled + "%";
}

window.onscroll = function () {
  progressBarScroll();
};


jQuery(window).scroll(function(e){ 
  var $el = jQuery('.sticky-title-post'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
  if (jQuery(this).scrollTop() > 200 && !isPositionFixed){ 
    $el.css({'position': 'fixed', 'top': '0px', 'display': 'flex'}); 
  }
  if (jQuery(this).scrollTop() < 200 && isPositionFixed){
    $el.css({'position': 'static', 'top': '0px', 'display': 'none'}); 
  } 
});