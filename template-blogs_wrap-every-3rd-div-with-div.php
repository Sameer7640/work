<?php
$mainarrayq = array(
'post_type' => array('portfolio'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => -1,
);
$q = new WP_Query($mainarrayq); ?>

<div class="all_projects__wrapper">
    <?php while ($q->have_posts()) : $q->the_post();
        $i = $q->current_post;
        echo ( 0 == $i % 3 ) ? '<div class="grid__projects">' : ''
    ?>
    <div class="col-md-4">
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
                <h4 class="title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <p class="date">Posted : <?php echo get_the_date(); ?></p>
                <p class="text"><?php echo get_the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="blog-btn">Read More</a>
            </div>
        </div>
    </div>
    <?php
        echo ( $q->post_count == $i || 2 == $i % 3 ) ? '</div>' : '';
        endwhile;
    ?>
</div>