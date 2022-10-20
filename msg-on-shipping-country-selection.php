<?php 
/**
 * @snippet       Show Conditional Message Upon Country Selection @ WooCommerce Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.6.2
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// Part 1
// Add the message notification and place it over the billing section
// The "display:none" hides it by default
  
add_action( 'woocommerce_before_checkout_billing_form', 'bbloomer_echo_notice_shipping' );
  
function bbloomer_echo_notice_shipping() {
echo '<div class="shipping-notice woocommerce-info" style="display:none">Please allow 5-10 business days for delivery after order processing.</div>';
}
    
// Part 2
// Show or hide message based on billing country
// The "display:none" hides it by default
  
add_action( 'woocommerce_after_checkout_form', 'bbloomer_show_notice_shipping' );
  
function bbloomer_show_notice_shipping(){
     
    ?>
  
    <script>
        jQuery(document).ready(function($){
  
            // Set the country code (That will display the message)
            var countryCode1 = 'CA';
            var countryCode2 = 'UK';
  
            $('select#billing_country').change(function(){
  
                selectedCountry = $('select#billing_country').val();
                  
                if( selectedCountry == countryCode1 ){
                    $('.shipping-notice').show();
                }
                else if( selectedCountry == countryCode2 ){
                    $('.shipping-notice').show();
                }
                else {
                    $('.shipping-notice').hide();
                }

            });
  
        });
    </script>
  
    <?php
     
}