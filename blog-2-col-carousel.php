<?php
$mainarrayq = array(
'post_type' => array('post'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => 6,
);
$q = new WP_Query($mainarrayq); ?>

<div class="owl-carousel owl-blogs-carousel owl-theme blogs-row">
	<?php while ($q->have_posts()) : $q->the_post(); ?>
	<div>
		<div class="blogs-wrapper">
			<div class="blogs-icon">
				<?php if (has_post_thumbnail()):
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
				?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" width="100%"></a>
				<?php else: ?>
				<?php endif ?>
				<p class="date"><?php echo get_the_date(); ?></p>
			</div>
			<div class="blogs-content">
				<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<p class="text"><?php echo get_the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>

<script>
    jQuery(document).ready(function(){
      jQuery('.owl-blogs-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:2
            }
        }
    });
    });
</script>

<style type="text/css">
@media (min-width: 1400px) {
	.blogs-section {
		margin-left: -60px!important;
		margin-right: -60px!important;
	}
}
.owl-blogs-carousel .blogs-wrapper {
    position: relative;
    margin: 20px 35px;
    border: 1px solid #C4C4C4;
}
.owl-blogs-carousel .blogs-wrapper .date {
    position: absolute;
    top: 0;
    left: 0;
    width: max-content;
    transform: rotate(-90deg) translateX(-100%) translateY(-100%);
    transform-origin: left top;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    font-size: 18px;
}
.owl-blogs-carousel .blogs-wrapper .blogs-content {
    padding: 20px;
    position: relative;
    padding-right: 80px;
}
.owl-blogs-carousel .blogs-wrapper .blogs-content .title {
    font-family: 'Poppins';
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 5px;
}
.owl-blogs-carousel .blogs-wrapper .blogs-content > a {
    font-size: 25px;
    border: 1px solid #C4C4C4;
    width: 50px;
    height: 50px;
    padding-left: 3px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
}
.owl-blogs-carousel .blogs-wrapper .blogs-content > a:hover {
    background: #C4C4C4;
    color: #fff;
}
.owl-blogs-carousel .owl-nav>div[class*=prev] {
    left: 0px;
    margin: 0px !important;
}
.owl-blogs-carousel .owl-nav>div[class*=next] {
    right: 0px;
    margin: 0px !important;
}
.owl-blogs-carousel .owl-nav {
    display: flex;
    justify-content: center;
    position: absolute;
    top: -150px;
    right: 30px;
}
.owl-blogs-carousel .owl-nav>div {
    position: static;
    opacity: 1;
    transform: none;
    visibility: visible;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 60px;
    margin-top: -1px !important;
    margin-bottom: -1px !important;
    margin-left: -1px !important;
    margin-right: -1px !important;
    border: 1px solid #C4C4C4;
}
.owl-blogs-carousel .owl-nav>div::after {
    content: '';
    background-image: url(https://eseospace.dev/websites/bluemonarchpediatrics/wp-content/uploads/2021/03/Arrow_Black-1.svg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    width: 25px;
    height: 20px;
    color: #333333;
    font-size: 16px;
}
.owl-blogs-carousel .owl-nav>div.owl-prev::after {
    background-image: url(https://eseospace.dev/websites/bluemonarchpediatrics/wp-content/uploads/2021/03/Arrow_Black-2.svg);
}
.owl-blogs-carousel .owl-nav>div:hover {
    background: #92A7BA;
}
@media (max-width: 992px) {
    .owl-blogs-carousel .owl-nav>div {
        width: 50px;
        height: 40px;
    }
    .owl-blogs-carousel .owl-nav>div::after {
        width: 20px;
        height: 15px;
    }
    .owl-blogs-carousel .owl-nav {
        position: relative;
        right: 0;
        top: 0;
        margin: 4% 0;
    }
}
</style>