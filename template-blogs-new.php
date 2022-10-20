<?php
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
);
$query = new WP_Query($query_args);
?>
<?php if ($query->have_posts()) : ?>
    <div class="row latest-articles">
        <div class="col-lg-6">
            <ul class="articles-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="article-item"><a href="#"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="col-lg-6">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="post-box">
                    <div class="post-box_img">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="post-box_content">
                        <div class="post-box_date">
                            <?php the_time('F j, Y'); ?>
                        </div>
                        <h3 class="post-box_title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="post-box_text">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="post-box_more">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>