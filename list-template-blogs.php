<?php
$mainarrayq = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => -1,
);
$q = new WP_Query($mainarrayq); ?>

<div class="row blogs-row">
	<?php while ($q->have_posts()) : $q->the_post(); ?>
	<div class="col-md-12">
		<div class="row blogs-wrapper">
			<div class="col-md-5 blogs-icon">
				<?php if (has_post_thumbnail()):
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
				?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
				<?php else: ?>
				<?php endif ?>
			</div>
			<div class="col-md-7 blogs-content">
				<h4 class="title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
				<p class="date">Posted : <?php echo get_the_date(); ?></p>
				<p class="text"><?php echo get_the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/02/Arrow_Black-1-1.svg"></a>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>