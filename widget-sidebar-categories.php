<div class="custom-widget-categories">
    <h5 class="widget-title">Categories</h5>
    <div class="categories-list-wrap nano">
        <ul class="categories-list-cs nano-content">
            <?php 
            $term = get_queried_object()->term_id;
            $termid = get_term($term, 'product_cat' );
            if($termid->parent > 0) 
                { 
                    $args = array(
                        'orderby'       => 'name', 
                        'order'         => 'ASC',
                        'hide_empty'    => false, 
                        'child_of'      => $termid->parent,
                ); 
                $siblingproducts = get_terms( 'product_cat', $args);
                foreach ($siblingproducts as $siblingproduct) { 
                     if ($siblingproduct->term_id == $term ) {  ?>
                        <li>
                <?php } else { ?>    
                        <li>
                <?php } ?>    
                    <a href="<?php echo get_term_link( $siblingproduct ); ?>"><?php echo $siblingproduct->name; ?></li>
            <?php }
            } else {
                wp_list_categories( array(
                    'orderby' => 'name',
                    'title_li' => '',
                    'taxonomy' => 'product_cat'
                    )
                );
            }
            ?>
        </ul>
    </div>
</div>