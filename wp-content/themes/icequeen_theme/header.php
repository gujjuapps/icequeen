<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <link rel="shortcut icon" type="image/ico" href="<?php echo get_field('demo_favicon_icon', 'option'); ?>" />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" type='text/css' media='all' />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/bootstrap-datepicker3.css" type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo get_template_directory_uri();?>/css/style.css' type='text/css' media='all' />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/menu_style.css" type='text/css' media='all' />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/owl.carousel.css" type='text/css' media='all' />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/jquery.mCustomScrollbar.css" type='text/css' media='all' />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css" type='text/css' media='all' />
      <link rel='stylesheet' href="<?php echo get_template_directory_uri();?>/css/prettyPhoto.css" type='text/css' media='all' />
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
                  <div class="row">
                        <div class="col-sm-2">
                           <div class="logo-box">
                                <?php if($site_logo) { ?>
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo get_bloginfo(); ?>" class="logo_img"><img src="<?php echo $site_logo; ?>" alt="<?php echo get_bloginfo(); ?>" /></a>
                            </div>
                        <?php } ?>
                           </div>
                        </div>
                        <div class="col-sm-8">
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
                        <div class="col-sm-2">
                           <div class="header_social">
                           <a href="https://www.facebook.com/icequeen.ae" title="Follow Us on Facebook"><svg class="svg-inline--fa fa-facebook-f fa-w-9 fa-lg" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg></a>|<a href="http://instagram.com/icequeenuae" title="Instagram"><svg class="svg-inline--fa fa-instagram fa-w-14 fa-lg" aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><!-- <i class="fab fa-instagram fa-lg"></i> --></a>|<a href="http://twitter.com/CRYOatICEQUEEN" title="Twitter"><svg class="svg-inline--fa fa-twitter fa-w-16 fa-lg" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg></a>|<a href="ar/index.html" title="Arabic"><img src="<?php echo get_template_directory_uri();?>/images/ar.png" alt="AR"></a>|<a href="ru/index.html" title="Russian"><img src="<?php echo get_template_directory_uri();?>/images/ru.png" alt="Russian"></a>
                           </div>
                           </div>

                        </div>
                
               </div>
            </div>
            <!-- .header-wrapper -->
         </header>
      </div>