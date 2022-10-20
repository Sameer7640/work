<?php
$mainarrayq = array(
'post_type' => array('news'),
'post_status' => array('publish'),
'orderby' => 'date',
'order' => 'DESC',
'posts_per_page' => -1,
);
$q = new WP_Query($mainarrayq); ?>

<style>
.inthenews { max-width: 1000px; margin: 4vh auto 8vh!important; }
.inthenews>div { padding: 30px; }
.inthenews>div>div { padding: 10px 0; background: #F3F3F3; }
.inthenews .brand-icon { max-height: 50px; margin-bottom: 10px; min-height: 50px; display: flex; align-items: center; justify-content: center; }
.inthenews .brand-icon img { max-height: 50px; width: auto; max-width: 180px; }
.inthenews .img-with-title { position: relative; }
.inthenews .img-with-title h4 { position: absolute; top: 0; left: 0; right: 0; color: white; padding: 30px 20px; font-weight: bold; font-size: 24px; letter-spacing: 0.04em; }
.inthenews .content, .inthenews .date-and-btn { padding: 10px 30px; }
.inthenews .content { font-size: 16px; }
.inthenews .date-and-btn { display: flex; justify-content: space-between; align-items: center; }
.inthenews .date-and-btn .date { padding-left: 20px; position: relative; }
.inthenews .date-and-btn .date::before { content: ''; background: url(https://eseospace.co/websites/jalpashethnutrition/wp-content/uploads/2020/10/calendar_today_24px.svg); width: 15px; height: 15px; display: inline-block; position: absolute; left: 0; top: 3px; background-size: contain; }
.inthenews .date-and-btn .btn-cs img { width: 45px; transition: 0.3s ease-in-out; }
.inthenews .date-and-btn .btn-cs img:hover { transform: scale(1.1); }
</style>

<div class="row inthenews">
    <?php while ($q->have_posts()) : $q->the_post(); ?>
    <div class="col-md-6">
        <div class="col-inner">
            <div class="brand-icon">
                <!--<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/10/EBTV-1.png">-->
                <img src="<?php the_field('press_logo'); ?>">
            </div>
            <div class="img-with-title">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()):
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
					?><img src="<?php echo $thumbnail[0]; ?>" width="100%">
					<?php else: ?>
					<?php endif ?>
                    <h4><?php the_title(); ?></h4>
                </a>
            </div>
            <div class="content"><?php echo substr(get_the_content(),0, 150); ?>...</div>
            <div class="date-and-btn">
                <div class="date">12 Aug 2020</div>
                <div class="btn-cs"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/10/up-arrow-2.png"></a></div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>