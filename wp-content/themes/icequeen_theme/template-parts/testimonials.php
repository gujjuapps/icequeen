<?php
/**
 * Template Name: Testimonials Page
 */

get_header(); ?>
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section>
      <div class="cms-pages">
       <div class="container">
        
           <?php
            if( get_query_var('paged') ) {
              $page = get_query_var( 'paged' );
            } else {
              $page = 1;
            }
            $row              = 0;
            $testimonial_per_page  = get_option('posts_per_page');;
            $testimonial           = get_field( 'demo_add_testimonials' );
            $total            = count( $testimonial );
            $pages            = ceil( $total / $testimonial_per_page );
            $min              = ( ( $page * $testimonial_per_page ) - $testimonial_per_page ) + 1;
            $max              = ( $min + $testimonial_per_page ) - 1;
            if( have_rows( 'demo_add_testimonials' ) ) { ?>
              <?php while( have_rows( 'demo_add_testimonials' ) ): the_row();
                $row++;
                if($row < $min) { continue; }
                if($row > $max) { break; } ?>
        <?php   $testimonial_title = get_sub_field( 'demo_testimonial_title' );
                $testimonial_content = get_sub_field( 'demo_testimonil_content' );
        ?>
               <div class="testimonial_item">
                    <?php echo $testimonial_content; ?>
                     <p class="client-label">- <?php echo $testimonial_title; ?></p>
                </div>
          
             <?php endwhile;
							?>
           <div class="my_pagination">
            <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links_cust( array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $pages
                ) );
                ?>
         </div>
         
       </div>
      </div>
     </section>
     <?php } ?>
<?php
	get_footer();
?>
