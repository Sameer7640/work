jQuery(document).ready(function() {
  jQuery('.product-single__media-wrapper').magnificPopup({
        delegate: 'img',
        type: 'image',
        gallery: {
            enabled: false
        },
        callbacks: {
            elementParse: function(qw) {
                qw.src = qw.el.attr('src');
            }
        }


    });
});