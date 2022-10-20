function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// WP HEAD HOOK
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');



<?php 
$popularpost = new WP_Query(
    array(
    'posts_per_page' => 4,
    'meta_key' => 'wpb_post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
    )
);
while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
 
<div class="col-md-12">
        <div class="blogs-wrapper">
            <div class="blogs-icon">
                <?php if (has_post_thumbnail()):
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
                ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
                <?php else: ?>
                <?php endif ?>
            </div>
            <div class="blogs-content">
                <?php echo do_shortcode(‘[rt_reading_time label=”Reading Time:” postfix=”minutes”]’); ?>
                <h4 class="title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <p class="text"><?php echo strip_tags(substr(get_the_content(), 0, 150)); ?></p>
                <div class="post-footer">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                    <p class="author"><?php echo get_the_author(); ?></p>
                    <p class="date"><?php echo get_the_date(); ?></p>
                </div>
                <a href="<?php the_permalink(); ?>" class="blog-btn">Read More</a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
 
<?php endwhile; ?>