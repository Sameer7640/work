<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.css">


<?php 

// HIDE PRODUCT TABS ON SINGLE PRODUCT PAGE

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] ); // Remove the description tab
    unset( $tabs['reviews'] ); // Remove the reviews tab
    unset( $tabs['additional_information'] ); // Remove the additional information tab
    return $tabs;
}



// ENABLE PRODUCTS DESCIRIPTION WOOCOMMERCE
add_action( 'woocommerce_after_shop_loop_item_title', 'wc_add_short_description' );
function wc_add_short_description() {
	global $product;

	?>
        <div itemprop="description">
			<?php echo substr( apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ,0,100 ); echo '...' ?>
        </div>
	<?php
}


// ADD WOOCOMMERCE ATTRIBUTES TO SHOP PRODUCTS

// Method 1
add_action( 'woocommerce_after_shop_loop_item_title', 'display_size_attribute', 5 );
function display_size_attribute() {
    global $product;

    if ( $product->is_type('variable') ) {
        $taxonomy = 'pa_size';
        echo '<span class="attribute-size">' . $product->get_attribute($taxonomy) . '</span>';
    }
}

// Method 2
add_action('woocommerce_after_shop_loop_item_title', 'cstm_display_product_category', 5);

function cstm_display_product_category()
{
  global $product;
  $size = $product->get_attribute('pa_size');

 if(isset($size)){
    echo '<div class="items"><p>Size: ' . $size . '</p></div>';
 }
}



<?php

// CUSTOM PRODUCT TAB CODE
add_filter( 'woocommerce_product_tabs', 'cs_custom_tab' );
function cs_custom_tab( $tabs ) {
$tabs['cs_custom_tab'] = array(
'title'    => 'Washing Instructions',
'callback' => 'cs_custom_tab_content', // the function name, which is on line 15
'priority' => 50,
);
return $tabs;
}
function cs_custom_tab_content( $slug, $tab ) {
echo '<p><strong>NUCCI Customs Washing Instructions: </strong></p><p>Your garment is handmade with love. Here are some washing tips to help preserve its originality:</p><ul><li>Turn inside out</li><li>Machine wash cold</li><li>Wash alone or with like colors</li><li>Do not use bleach</li><li>Do not put iron directly onto vinyl design</li><li>Tumble dry at low heat</li><li>Do not dry clean</li></ul>';
}




// ADD FIELDS IN CHECKOUT FORM

function cw_custom_checkbox_fields( $checkout ) {
    echo '<div class="cw_custom_class"><h3>'.__('Gift Wrapping: ').'</h3>';
    woocommerce_form_field( 'custom_checkbox', array(
        'type'          => 'checkbox',
        'label'         => __('Send as a Gift?'),
    ), $checkout->get_value( 'custom_checkbox' ));
     woocommerce_form_field( 'custom_text', array(
        'type'          => 'textarea',
        'label'         => __('Add your message here'),
        'required'  => true,
    ), $checkout->get_value( 'custom_text' ));
    echo '</div>';
}

add_action('woocommerce_after_order_notes', 'cw_custom_checkbox_fields');

add_action('woocommerce_checkout_process', 'cw_custom_process_checkbox');
function cw_custom_process_checkbox() {
    global $woocommerce;
    if (!$_POST['custom_checkbox'])
        wc_add_notice( __( 'Notification message.' ), 'error' );
        
    if (!$_POST['custom_text'])
        wc_add_notice( __( 'Notification message.' ), 'error' );
}


// CUSTOM FIELD CALLING IN WORDPRESS
add_action( 'woocommerce_single_product_summary', 'custom_action_after_single_product_title', 6 );
function custom_action_after_single_product_title() { 
    global $product; 

    $product_id = $product->get_id(); // The product ID
    
    $brand_name = get_field('brand_name');

    // Displaying your custom field under the title
    if (!empty($brand_name)) {
        echo '<p class="book-author">' . $brand_name . '</p>';
    }
}


// WORDPRESS PRODUCT ATTRIBUTES

// (If needed) Get an instance of the WC_Product Object from the product ID
$product = wc_get_product( $product_id );

// Get the product attribute value(s)
$color = $product->get_attribute('pa_color');

// if product has attribute 'pa_color' value(s)
if( ! empty( $color ) ){
    echo 'Hello';
} else {
    // No product attribute is set for this product
}


// IF COLOR ATTRIBUTE EXISTS ECHO TAB
add_filter( 'woocommerce_product_tabs', 'cs_custom_tab' );
function cs_custom_tab( $tabs ) {
    global $product;
    $color = $product->get_attribute('pa_color');
    if( ! empty($color) ) {
        $tabs['cs_custom_tab'] = array(
            'title'    => 'Washing Instructions',
            'callback' => 'cs_custom_tab_content', // the function name, which is on line 15
            'priority' => 50,
        );
    }
    return $tabs;
}
function cs_custom_tab_content( $slug, $tab ) {
    echo '<p><strong>NUCCI Customs Washing Instructions: </strong></p><p>Your garment is handmade with love. Here are some washing tips to help preserve its originality:</p><ul><li>Turn inside out</li><li>Machine wash cold</li><li>Wash alone or with like colors</li><li>Do not use bleach</li><li>Do not put iron directly onto vinyl design</li><li>Tumble dry at low heat</li><li>Do not dry clean</li></ul>';
}
