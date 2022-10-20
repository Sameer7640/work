<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => -1,
);
$q = new WP_Query($mainarrayq); ?>

<?php
$mainarrayr = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => 3,
);
$r = new WP_Query($mainarrayr); ?>
<div class="insights-blog row">
	<div class="col-md-7">
		<div class="insights-wrapper">
			<?php while ($r->have_posts()) : $r->the_post(); ?>
			<div class="row insights-row">
				<div class="col-md-5 insights-icon">
					<?php if (has_post_thumbnail()):
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
					?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
					<?php else: ?>
					<?php endif ?>
					
				</div>
				<div class="col-md-7">
					<a href="<?php the_permalink(); ?>"><h3 class="insights-title"><?php the_title(); ?></h3></a>
					<div class="row post-meta">
						<div class="col-md-6 col-xs-6 col-6"><p class="insights-date"><span><img src="http://eseospace.co/websites/otconsulting/wp-content/uploads/2020/09/date_range_24px.svg"></span><span>09.21.2020</span></p></div>
						<div class="col-md-6 col-xs-6 col-6"><p class="insights-views"><span><img src="http://eseospace.co/websites/otconsulting/wp-content/uploads/2020/09/visibility_24px.svg"></span><span>132</span></p></div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
	<div class="col-md-5 recommended-insights">
		<div class="wrapper">
			<h3 class="title">Recommended Insights</h3>
			<?php while ($r->have_posts()) : $r->the_post(); ?>
			<div class="row insight">
				<div class="col-md-5 insights-icon">
					<?php if (has_post_thumbnail()):
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
					?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
					<?php else: ?>
					<?php endif ?>
				</div>
				<div class="col-md-7">
					<a href="<?php the_permalink(); ?>"><h3 class="insights-title"><?php the_title(); ?></h3></a>
					<div class="row post-meta">
						<div class="col-md-6 col-xs-6 col-6"><p class="insights-date"><span><img src="http://eseospace.co/websites/otconsulting/wp-content/uploads/2020/09/date_range_24px.svg"></span><span>09.21.2020</span></p></div>
						<div class="col-md-6 col-xs-6 col-6"><p class="insights-views"><span><img src="http://eseospace.co/websites/otconsulting/wp-content/uploads/2020/09/visibility_24px.svg"></span><span>132</span></p></div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<div class="post-carousel">
	<div class="separator-gradient-left"></div>
	<h3 class="title">Our Insights</h3>
	<div class="owl-carousel">
    	<?php while ($q->have_posts()) : $q->the_post(); ?>
    	<div>
    		<div class="row insights-carousel">
    			<div class="col-12 insights-icon">
    				<?php if (has_post_thumbnail()):
    				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
    				?>
    				<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
    				<?php else: ?>
    				<?php endif ?>
    			</div>
    			<div class="col-12">
    				<div class="row post-meta">
    					<div class="col-md-6 col-xs-6 col-6"><p class="insights-date"><span><img src="http://eseospace.co/websites/otconsulting/wp-content/uploads/2020/09/date_range_24px.svg"></span><span>09.21.2020</span></p></div>
    					<div class="col-md-6 col-xs-6 col-6"><p class="insights-views"><span><img src="http://eseospace.co/websites/otconsulting/wp-content/uploads/2020/09/visibility_24px.svg"></span><span>132</span></p></div>
    				</div>
    				<a href="<?php the_permalink(); ?>"><h3 class="insights-title"><?php the_title(); ?></h3></a>
    			</div>
    		</div>
    	</div>
    	<?php endwhile; ?>
    </div>
    <div class="separator-gradient-right"></div>
</div>
<script>
jQuery(document).ready(function(){
	jQuery(".owl-carousel").owlCarousel({
		loop:true,
		margin:35,
		responsiveClass:true,
			responsive:{
			0:{
			items:2,
			nav:true
			},
			600:{
			items:3,
			nav:false
			},
			1000:{
			items:5,
			nav:true,
			loop:false
			}
		}
	});
});

</script>