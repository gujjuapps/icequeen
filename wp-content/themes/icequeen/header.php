<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <link rel="shortcut icon" type="image/ico" href="<?php echo get_field('demo_favicon_icon', 'option'); ?>" />
	  <script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script> 
      <?php wp_head(); ?>
      <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
   </head>
   <?php global $post;
       $pagebody = $post->post_name;
       $site_logo           = get_field('demo_site_logo', 'option');
       $email               = get_field('demo_email_address', 'option');
       $phone               = get_field('demo_phone_no', 'option');
       $book_now            = get_field('demo_booknow_no', 'option');
?>
   <body class="home page-template-default page page-id-2 sample-page twentyseventeen-front-page has-header-image page-two-column colors-light">
      <div class="site_main">

      <div class="menu-main">
         <header class="header header-two">
            <div class="header-wrapper">
               <div class="head-bg">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="logo-box">
                        <?php if($site_logo) { ?>
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo get_bloginfo(); ?>" class="logo_img"><img src="<?php echo $site_logo; ?>" alt="<?php echo get_bloginfo(); ?>" /></a>
                            </div>
                        <?php } ?>
                           </div>
                           <!-- .logo-box -->
                           <div class="menu-bg">
                              <div class="right-box">
                                 <div class="right-box-wrapper">
                                    <div class="primary">
                                       <div class="navbar navbar-default" role="navigation">
                                          <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target=".primary .navbar-collapse">
                                          <span class="text"></span>
                                          <span class="icon-bar"></span>
                                          </button>
                                           
                                          <nav class="collapse collapsing navbar-collapse">
                                           <?php wp_nav_menu(array('theme_location' => 'header_menu', 'menu_class' => 'nav navbar-nav navbar-center', 'container' => '', 'link_before' => '', 'link_after'=>'', 'before' => '', 'after' => '', 'walker' =>  new My_Walker_Nav_Menu() ));  ?>
                                              
                                          </nav>
                                       </div>
                                    </div>
                                    <!-- .primary -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--.row -->
                  </div>
               </div>
            </div>
            <!-- .header-wrapper -->
         </header>
      </div>