<?php
$categories = get_categories();
// echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
foreach ($categories as $category) : ?>
    <div class="category-wrap">
        <pre>
    <?php print_r($category); ?>
    <?php 
    $image_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
    $post_thumbnail_img = wp_get_attachment_image_src( $image_id, 'thumbnail' );

    echo '<img src="' . $post_thumbnail_img[0] . '" alt="' . $category->name . '" />';
    ?>
    <?php //print_r(get_term_meta($category->term_id)); ?>
    </pre>
    </div>
<?php endforeach; ?>