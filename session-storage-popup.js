jQuery(document).ready(function ($) {
    $('.preloader-vid video').on('ended', function () {
        jQuery('.preloader-vid').fadeOut();
        jQuery('body').addClass('vid-ended');
        //jQuery('body.home.vid-ended .entry-content').fadeIn();
    });
    if (sessionStorage.getItem('advertOnce') !== 'true') {
        jQuery('.preloader-vid').show();
        sessionStorage.setItem('advertOnce', 'true');
        console.log('yes');
    } else {
        jQuery('.preloader-vid').hide();
        jQuery('body').addClass('vid-ended');
    }
});