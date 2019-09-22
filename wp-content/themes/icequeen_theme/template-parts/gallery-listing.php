<?php
/**
 * Template Name: Gallery Listing Page
 */

get_header(); ?>
<div class="container-main">
            	<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
            	<section class="inner_page gallery_page">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                            	<div class="gallery">
                                    <div class="row">
                                        <?php $gallery = get_field('demo_gallery_option'); // Get our gallery
                                                $images = array(); // Set images array for current page

                                                $items_per_page  = get_option('posts_per_page'); // How many items we should display on each page
                                                $total_items = count($gallery); // How many items we have in total
                                                $total_pages = ceil($total_items / $items_per_page); // How many pages we have in total
                                                //Get current page
                                                if ( get_query_var( 'paged' ) ) {
                                                        $current_page = get_query_var( 'paged' );
                                                }elseif ( get_query_var( 'page' ) ) {
                                                        //this is just in case some odd rewrite, but paged should work instead of page here
                                                        $current_page = get_query_var( 'page' );
                                                }else{
                                                        $current_page = 1;
                                                }
                                                $starting_point = (($current_page-1)*$items_per_page); // Get starting point for current page

                                                // Get elements for current page
                                                if($gallery){
                                                        $images = array_slice($gallery,$starting_point,$items_per_page);
                                                }
                                                if(!empty($images)){
                                                        //your gallery loop here
                                                        foreach( $images as $image ):
                                                $upload_gallery_image_url = aq_resize( $image['url'], 370, 320, true, false, true );
                                            ?>
                                         <div class="col-xs-6 col-sm-4 col-md-3 col-ar-12">
                                            <figure>
                                                <a href="<?php echo $image['url'];?>" data-fancybox="group" data-caption="">
                                                <img src="<?php echo $upload_gallery_image_url[0];?>" alt="<?php echo $image['title'];?>">
                                                <span class="fa fa-search"></span>
                                            </a>
                                            </figure>
                                        </div>
                                <?php endforeach; } ?>
                       
                            <div class="col-xs-12 text-center">
                                <div class="my_pagination">
                                    <?php
                                     // And our pagination
                                    $big = 999999999;
                                    echo paginate_links_cust( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => $current_page,
                                            'total' => $total_pages,

                                    ) );?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
	get_footer();
?>
