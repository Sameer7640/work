<div id="root">
    <?php 
    // $html = get_post_field('post_content', 79);
    $id = 79;

    $args = array(
        'p'         => $id, // ID of a page, post, or custom type
        'post_type' => 'cms_block' //any keyword is for any post type
    );
    
    $my_posts = new WP_Query($args);
    
    while ($my_posts->have_posts()) : $my_posts->the_post();

        $vccss = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
        $vccss1 = get_post_meta($id, 'woodmart_shortcodes_custom_css', true);
        
        WPBMap::addAllMappedShortcodes();

        echo '<style>' . $vccss . $vccss1 . '</style>';
        the_content();

    endwhile;
    ?>
</div>