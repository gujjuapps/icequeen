<?php
/**
 * Template Name: Location Page
 */

get_header(); ?>
<div class="container-main">
    <?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
    <section class="inner_page locations_page">
        <div class="container">
            <div class="row">
                <?php $serivces_object = get_field('demo_add_location');
                        if( $serivces_object ) {
                        if( get_query_var('paged') ) {
                          $page = get_query_var( 'paged' );
                        } else {
                          $page = 1;
                        }
                        $row              = 0;
                        $testimonial_per_page  = get_option('posts_per_page');;
                        $testimonial           = get_field( 'demo_add_location' );
                        $total            = count( $testimonial );
                        $pages            = ceil( $total / $testimonial_per_page );
                        $min              = ( ( $page * $testimonial_per_page ) - $testimonial_per_page ) + 1;
                        $max              = ( $min + $testimonial_per_page ) - 1;
                        ?>
                        <?php foreach( $serivces_object as $serivces_obj) {
                        $service_title_post                     = $serivces_obj['demo_location_title'];
                        $service_sub_title                      = $serivces_obj['demo_sub_location_sub_title'];
                        $service_details_url                    = $serivces_obj['demo_location_url'];
                        $services_image_src                     = $serivces_obj['demo_location_images'];
                        if($services_image_src){
                                $portt_filter 	= aq_resize( $services_image_src, 370, 400, true, false, true );
                                $fitlerservices_image_src = $services_image_src ? $portt_filter[0] : 'https://placeholdit.imgix.net/~text?txtsize=20&txt=' .$service_title_post.'&w=370&h=400';
                             }
                               $row++;
                            if($row < $min) { continue; }
                            if($row > $max) { break; } ?>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-ar-12">
                            <div class="location">
                                <a href="<?php echo $fitlerservices_image_src;?>" title="<?php echo $service_title_post; ?>">
                                    <figure>
                                        <img src="<?php echo $upload_gallery_image_url[0];?>" alt="<?php echo $service_title_post; ?>" />
                                        <figcaption>
                                            <h4><?php echo $service_title_post; ?></h4>
                                            <span class="title"><?php echo $service_sub_title; ?></span>
                                            <span class="fa fa-plus-square-o"></span>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <div class="col-xs-12 text-center">
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
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<?php
    get_footer();
?>
