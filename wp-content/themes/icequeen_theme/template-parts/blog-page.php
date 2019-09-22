<?php
/**
 * Template Name: Blog Page
 */

get_header(); ?>
<div class="container-main">
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section class="inner_page news_page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $posts_per_page = get_option('posts_per_page');
            $banner_args = array(
                                'posts_per_page' => $posts_per_page,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'paged' => $paged

                            );
        $banner_query = new WP_Query($banner_args);
        if ($banner_query) {
    ?>
        <?php while ($banner_query->have_posts()) { $banner_query->the_post();
                     $blog_title_post        = get_the_title();
                    $blog_details_url      = get_permalink();
                    $blog_content           = strip_tags(get_the_content());
                    if($blog_content) {
                        $blog_filter_cont = substr($blog_content ,0,241 ) . "...";
                    }
            ?>
                <div class="news-content">
                    <span class="news_dates">
                        <span class="news_month"><?php echo get_the_time('M'); ?></span>
                        <span class="news_date"><?php echo get_the_time('j'); ?></span>
                    </span>
                    <a href="<?php echo $blog_details_url;  ?>" title="<?php echo $blog_title_post; ?>" class="news_title"><?php echo $blog_title_post; ?></a>
                    <p><?php echo $blog_filter_cont; ?></p>
                </div>
                <?php } wp_reset_postdata(); ?>
                <div class="my_pagination">
                     <?php
                            $big = 999999999; // need an unlikely integer
                            echo paginate_links_cust( array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $banner_query->max_num_pages
                            ) );
                        ?>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="blog_listing">
                    <h5>Categories</h5>
                    <span></span>
                   <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="blog_listing">
                    <h5>Archives</h5>
                    <span></span>
                   <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
                <div class="blog_listing">
                    <h5>Recent Posts</h5>
                    <span></span>
                    <ul>
            <?php $services_args = array(
                                    'posts_per_page' 	=> 5,
                                    'post_type' 		=> 'post',
                                    'post_status' 		=> 'publish'
                             );

                                    $services_post = get_posts( $services_args );
                                    $j=1;

                            foreach ( $services_post as $post ) : setup_postdata( $post );
                                    $id = get_the_ID();
                                    $title = get_the_title();
                                    if($main_id == $id){ $class_menu = 'class="selected"';} else { $class_menu = '';}
            ?>
                    <li <?php echo $class_menu; ?>><a href="<?php echo get_permalink($id); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
            <?php
                    $j++;
                    endforeach;
                    echo '</ul>';
                    wp_reset_postdata();
            ?>
                </div>
                <div class="blog_listing tags">
                    <h5>Tags</h5>
                    <span></span>
                    <div class="tags-box">
                     <?php dynamic_sidebar('sidebar-3'); ?>
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
