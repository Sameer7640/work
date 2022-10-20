<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => 3,
);
$q = new WP_Query($mainarrayq); ?>

<div class="row blogs-row">
	<?php while ($q->have_posts()) : $q->the_post(); ?>
	<div class="col-md-4">
		<div class="blogs-wrapper">
			<p class="category">
				<?php
				$categories = get_the_category(get_the_ID());
				foreach($categories as $category){
				  echo $category->name;
				} ?>
			</p>
			<div class="blogs-icon">
				<?php if (has_post_thumbnail()):
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
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
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>