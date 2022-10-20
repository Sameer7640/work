<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$mainarray = array(
    'post_type' => array('post'),
    'post_status' => array('publish'),
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'paged'       => $paged,
);
$q = new WP_Query($mainarray); ?>


<div class="container cs-posts">
<?php while ($q->have_posts()) : $q->the_post(); ?>
    <div class="row">
        <div class="column4">
            <?php if (has_post_thumbnail()):  
               $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium', true);
               ?>
               <img src="<?php echo $thumbnail[0]; ?>" width="100%">
               <?php else: ?>
               <?php endif ?>
           </div>
           <div class="column8">
            <h3><?php the_title(); ?></h3>
            <p><?php echo substr(get_the_content(), 0, 200); ?></p>
            <a href="<?php the_permalink(); ?>" class="primary-theme-btn">READ MORE</a></div>
        </div>
    <?php endwhile; ?>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="text-center pagination">
            <?php if (function_exists("pagination")) {
                pagination($q->max_num_pages);
            } ?>
        </div>
    </div>
</div>


<?php 
function pagination($pages = '', $range = 4){  
  $showitems = ($range * 2)+1;  

  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == '')
  {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages)
    {
      $pages = 1;
    }
  }  

  if(1 != $pages)
  {
         // echo "<div class=\"pagination\">
         // <span>Page ".$paged." of ".$pages."</span>";        
    echo "<div class=\"woocommerce-pagination\"><ul class='page-numbers'>";

    echo '<li>';
    previous_posts_link('<span class="prev page-numbers">←</span>');
    echo '</li>';

    if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
    if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";

    for ($i=1; $i <= $pages; $i++)
    {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
      {
        echo ($paged == $i)? "<li><span class=\"page-numbers current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
      }
    }

    if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";  
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
    echo '<li>';
    next_posts_link('<span class="next page-numbers">←</span>');
    echo '</li>';
    echo "</ul></div>\n";
  }
}