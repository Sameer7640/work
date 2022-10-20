<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => 1,
);
$q = new WP_Query($mainarrayq); ?>

<div class="latest-article">
	<?php while ($q->have_posts()) : $q->the_post(); ?>
	<div class="article-wrapper">
		<div class="row">
			<div class="col-md-6">
				<div class="article-icon">
					<?php if (has_post_thumbnail()):
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
					?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
					<?php else: ?>
					<?php endif ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="article-content">
					<p class="date"><?php echo get_the_date(); ?></p>
					<h4 class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<p class="text"><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="article-btn">
						<span>Continue Reading</span>
						<svg width="40" height="16" viewBox="0 0 40 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M38.7341 8.70711C39.1247 8.31658 39.1247 7.68342 38.7341 7.29289L32.3702 0.928932C31.9797 0.538408 31.3465 0.538408 30.956 0.928932C30.5654 1.31946 30.5654 1.95262 30.956 2.34315L36.6128 8L30.956 13.6569C30.5654 14.0474 30.5654 14.6805 30.956 15.0711C31.3465 15.4616 31.9797 15.4616 32.3702 15.0711L38.7341 8.70711ZM0.973022 9H38.027V7H0.973022V9Z" fill="white"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>