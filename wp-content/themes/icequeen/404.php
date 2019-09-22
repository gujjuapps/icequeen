<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>
<div class="container-main">
            	<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
            	<section class="inner_page cms_page">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                            	<div class="services-detail">
                                     <center>
                                        <h4><?php _e('Looking for something?', 'twentyfourteen'); ?></h4>
                                        <div class="page-content">
                                            <p><?php _e('We are sorry. The Web address you entered is not a functioning page on our site', 'twentyfourteen'); ?></p>
                                            <p>Go to <a href="<?php echo esc_url(home_url('/')); ?>">Home Page</a></p>
                                            <?php  ?>
                                        </div><!-- .page-content -->
                                    </center>
                            	</div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
<?php get_footer(); ?>
