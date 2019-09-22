<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section class="cms-pages search_page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                    <h3><?php printf( __( 'Search Results for : %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h3>


                    <?php if ( have_posts() ) {

                                $s = get_query_var('s');
                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                $posts_per_page = get_option('posts_per_page');
                                $service_args = array(
                                    'post_type' => array('page', 'post'),
                                    'posts_per_page' => $posts_per_page,
                                    'order' => 'ASC',
                                    'post_status' => 'publish',
                                    'paged' => $paged,
                                    's' => $s
                                );
                                $i = 1;

                    $loop = new WP_Query($service_args);
                    if ($loop->have_posts()) {
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <div class="search_content">
                              <h4><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                              <?php $cont = get_the_content();
                              if($cont){
                                  $content_blog = strip_tags($cont);
                              }
                              $tcnt     = get_field('demo_full_description');
                              if($tcnt){
                                  $content_blog = strip_tags($tcnt);
                              }
                           if($content_blog) { ?>
                                          <p><?php echo substr($content_blog ,0,295 ) . "..";	?></p>
                                  <?php } ?>
                                           <a href="<?php the_permalink(); ?>" class="main_btn theme_btn button primary" title="Read More">Read More</a>
                            </div>
                            <?php $i++;
                        endwhile; wp_reset_query(); ?>
                     <div class="my_pagination">
                             <?php
                                    $big = 999999999; // need an unlikely integer
                                    echo paginate_links_cust( array(
                                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $loop->max_num_pages
                                    ) );
                                ?>
                        </div>
                <?php } ?>
                </div>
                <?php } else { ?>
                        <h5><?php _e( 'No Results Found', 'perform' ); ?></h5>
                <?php } ?>
        </div>
        </div>

</section>
<?php get_footer(); ?>
