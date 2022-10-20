// jQUERY ONCHANGE EVENTS FOR CHECKBOX
jQuery('#custom_checkbox').change(function(){
    if(this.checked) {
        jQuery('#custom_text_field').show();
    } else {
        jQuery('#custom_text_field').hide();
    }
});


jQuery('#custom_checkbox').change(function() {
    jQuery('#custom_text').toggle();
});