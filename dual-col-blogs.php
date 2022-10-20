<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => 1,
);
$q = new WP_Query($mainarrayq); ?>

<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'offset' => 1,
'posts_per_page' => 3,
);
$r = new WP_Query($mainarrayq); ?>

<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'offset' => 4,
'posts_per_page' => 9999,
);
$s = new WP_Query($mainarrayq); ?>


<div class="all-blogs-wrap">
	<div class="row blogs-row multi-col">
		<div class="col-md-7">
		<?php while ($q->have_posts()) : $q->the_post(); ?>
			<div class="featured-blog-wrapper">
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
					<p class="text"><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="blog-btn">Continue Reading...</a>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<div class="col-md-5">
		<?php while ($r->have_posts()) : $r->the_post(); ?>
			<div class="row small-blogs">
				<div class="col-md-4 blogs-icon">
					<?php if (has_post_thumbnail()):
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
					?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
					<?php else: ?>
					<?php endif ?>
				</div>
				<div class="col-md-8 blogs-content">
					<h4 class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<p class="text"><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="blog-btn">Continue Reading...</a></p>
					
				</div>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
	<div class="row blogs-row">
		<?php while ($s->have_posts()) : $s->the_post(); ?>
		<div class="col-md-4">
			<div class="all-blogs-wrapper">
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
					<p class="text"><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="blog-btn">Continue Reading...</a>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>

