<?php

// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'DEMO_FRONTPAGE_ID' ) ){
	define( 'DEMO_FRONTPAGE_ID', '2' );
}
if( !defined( 'DEMO_BLOG_PAGE_ID' ) ){
	define( 'DEMO_BLOG_PAGE_ID', '62' );
}
if( !defined( 'DEMO_TESTIMONIAL_PAGE_ID' ) ){
	define( 'DEMO_TESTIMONIAL_PAGE_ID', '286' );
}
if( !defined( 'DEMO_LOCATION_PAGE_ID' ) ){
	define( 'DEMO_LOCATION_PAGE_ID', '58' );
}

if( !defined( 'DEMO_BANNER_POST_TYPE' ) ){
	define( 'DEMO_BANNER_POST_TYPE', 'banner' );
}

if( !defined( 'DEMO_SERVICE_POST_TYPE' ) ){
	define( 'DEMO_SERVICE_POST_TYPE', 'service' );
}

// for Custom Breadcream
include get_template_directory() . '/includes/custom-meta.php';

// inlcude Custom post type file
include get_template_directory() . '/includes/custom-posttype.php';

// inlcude aq_resizer FILE
include get_template_directory() . '/includes/aq_resizer.php';

// inlcude Custom post type file
include get_template_directory() . '/includes/custom-scripts.php';

// for Custom Breadcream
include get_template_directory() . '/includes/custom-bredcream.php';

// for Custom Pagination
include get_template_directory() . '/includes/custom-pagination.php';

// Whelak Theme Option by acf function
if( class_exists('acf') ) {
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Icequeen Settings',
			'menu_title'	=> 'Icequeen Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'      => false
		));
	}
}
/*
 * remove comment
 */
add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

/*
 * For menu selected class
 */
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) )
	 {
             $classes[] = 'selected ';
     }
	 if( in_array('current_page_parent', $classes) ){
             $classes[] = 'selected';
     }
	 return $classes;
}

function parent_nav_class($classes, $item){
     if(in_array('menu-item-has-children',$classes)){
             $classes[] = 'parent';
     }
     if(in_array('current-menu-item',$classes) || in_array('current-page-ancestor',$classes) || in_array('current-menu-ancestor',$classes)){
             $classes[] = 'selected';
     }
     return $classes;
}

function SearchFilter($query) {
   // If 's' request variable is set but empty
   if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
      $query->is_search = true;
      $query->is_home = false;
   }
   return $query;
}

// for use menu walker
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth=0, $args = array())
          {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"sub\">\n";
  }
}

/*
 * For Dashboard panel
 */
function favicon(){
echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_field( 'demo_favicon_icon', 'option' ).'" />',"\n";
}
add_action('admin_head','favicon');
add_action('login_head','favicon');

function custom_loginlogo_url($url) {

	return esc_url( home_url( '/' ) );
}


function remove_footer_admin () {
	echo '<span id="footer-thankyou">Web design by <a target="_blank" title="TOC Team" href="#" target="_blank">TOC Team</a></span>';
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function change_title_on_logo() {
	return get_bloginfo('name');
}
add_filter('login_headertitle', 'change_title_on_logo');

function st_welcome_panel() { ?>
	<div class="custom-welcome-panel-content">
	<h3><?php echo "Welcome to ".get_bloginfo('name'); ?></h3>
	<div class="welcome-panel-column-container">
	<div class="welcome-panel-column">
		<h4><?php _e( "Let's Get Started" ); ?></h4>
		<a class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo home_url(); ?>"><?php _e( 'Call me maybe !' ); ?></a>
			<p class="hide-if-no-customize"><?php printf( __( 'or, <a href="%s">edit your site settings</a>' ), admin_url( 'options-general.php' ) ); ?></p>
	</div>
	<div class="welcome-panel-column">
		<h4><?php _e( 'Next Steps' ); ?></h4>
		<ul>
		<?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
		<?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
		<?php else : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
		<?php endif; ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
		</ul>
	</div>
	<div class="welcome-panel-column welcome-panel-last">
		<h4><?php _e( 'More Actions' ); ?></h4>
		<ul>
			<li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-comments">' . __( 'Turn comments on or off' ) . '</a>', admin_url( 'options-discussion.php' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Learn more about getting started' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
		</ul>
	</div>
	</div>
	</div>
<?php }

function custom_login_logo() {
	echo '<style type="text/css">
	body, html{background:#02a0d6 !important;}
	.login form{padding:26px 24px !important;}
	#loginform{background:#4d5a66 !important; border:7px solid #fff; }
	.login label{color:#fff !important;     font-size: 16px;}
	#login {padding:6% 0 0;font-size:16px;}
	h1 a { background-image: url('.get_field('demo_site_logo', 'option').') !important; height:100px !important; width:428px !important; 	background-size:auto !important; margin:0 0 0 -50px !important }
	.wp-core-ui .button-primary{ border:1px solid #fff !important; box-shadow:none !important; text-shadow:none !important;
    background: none repeat scroll 0 0 #4d5a66 !important; color:#fff !important; font-weight:bold !important; text-transform:uppercase !important;}
	.wp-core-ui .button-primary:hover{ border:1px solid #fff !important; text-shadow:none !important;
    background: none repeat scroll 0 0 #FFF !important;
	transition: all 0.5s ease-in-out 0s;
    color:#4d5a66 !important;}
	.login #backtoblog a, .login #nav a{color:#ffffff !important; font-size:16px;}
	 .login #nav, .login #backtoblog{padding:0 !important;text-align:center;}
	.login #backtoblog a:hover, .login #nav a:hover{color:#4d5a66 !important;}
	.login .message { margin:10px 0 0 0;
     border-left: 4px solid #4d5a66 !important;
}
        .login #login_error { border-left-color: #4d5a66; !important;    margin-top: 15px;}

	</style>';
}

/*
 * For Contact Form 7 Mail tempalte
 */
function custom_mail_components($wpcf7_data, $form = null) {
 	 $logo_url = get_field('demo_site_logo','option');
 	 $wpcf7_data['body'] = str_replace('[logo_url]', $logo_url , $wpcf7_data['body'] );

	 $site_url = get_site_url();
	 $wpcf7_data['body'] = str_replace('[site_url]', $site_url , $wpcf7_data['body'] );

	 $site_phone = get_field('demo_phone_no','option');
	 $wpcf7_data['body'] = str_replace('[site_phone]', $site_phone , $wpcf7_data['body'] );

	 $site_email = get_field('demo_email_address','option');
	 $wpcf7_data['body'] = str_replace('[site_email]', $site_email , $wpcf7_data['body'] );

	 $site_name = get_bloginfo('name');
	 $wpcf7_data['body'] = str_replace('[site_name]', $site_name , $wpcf7_data['body'] );

	 $site_year = '&copy; '.date("Y").' Aust Migration & Settlement Services. All rights reserved.';
	 $wpcf7_data['body'] = str_replace('[site_year]', $site_year , $wpcf7_data['body'] );
     return $wpcf7_data;
}

/*
 *  For Remove slug form custom post type<?php if() { ?>
 */

function gp_remove_cpt_slug2( $post_link, $post, $leavename ) {
    if ( 'serives' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}

add_filter( 'post_type_link', 'gp_remove_cpt_slug2', 10, 3 );

function gp_parse_request_trick( $query ) {
    if ( ! $query->is_main_query() )
        return;
     if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'serives', 'page', 'post' ) );
    }
}

add_action( 'pre_get_posts', 'gp_parse_request_trick' );

// end code
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}

/*
 * To Disable Update WordPress nag
 */

function remove_core_updates() {
	 if(! current_user_can('update_core')){return;}
	 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
	 add_filter('pre_option_update_core','__return_null');
	 add_filter('pre_site_transient_update_core','__return_null');
}
add_filter( 'avatar_defaults', 'crunchifygravatar' );

function crunchifygravatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/screenshot.png';
    $avatar_defaults[$myavatar] = "Demo User";
    return $avatar_defaults;
}

remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
add_filter('nav_menu_css_class' , 'parent_nav_class' , 10 , 3);

add_filter('pre_get_posts','SearchFilter');
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

remove_action('welcome_panel','wp_welcome_panel');
add_action('welcome_panel','st_welcome_panel');

add_action('login_head', 'custom_login_logo');

add_filter( 'wpcf7_mail_components', 'custom_mail_components');
add_filter('admin_footer_text', 'remove_footer_admin');

add_action('after_setup_theme','remove_core_updates');

function demo_custom_innner_banner_code(){
          global $post;
          $page_banner_src    	= get_field('demo_page_banner');
          $default_banner_src 	= get_field('demo_default_page_banner', 'option');
          $page_banner_url	= !(empty ( $page_banner_src) ) ? $page_banner_src : $default_banner_src;
          if($page_banner_url){
            $image_welcome           = aq_resize( $page_banner_url, 1920, 457, true, false, true );
            $filter_page_banner_url  = $page_banner_url ? $image_welcome[0] : '';
        }
          $new_option_title         = get_post_meta($post->ID, 'cms_title_digital', true );

        ?>

  
                <section class="page-heading" id="page_title" style="background: url(<?php echo $filter_page_banner_url; ?>) no-repeat center center /cover transparent">
                    <div class="container">
                    <div class="page_heading_main">    
                         <?php if(is_archive() || is_category()) {
                    the_archive_title( '<h1>', '</h1>' );

                    }elseif(is_single()) { ?>
                        <h1><?php echo get_the_title(DEMO_BLOG_PAGE_ID); ?></h1>
                 <?php }elseif(is_404()){ ?>
                         <h1>Page Not Found</h1>
                <?php }elseif(is_search()) { ?>
                            <h1><?php printf( __( 'Search Results', 'twentysixteen' ) ); ?></h1>
                <?php }else{ ?>
                <?php
                    if ($new_option_title == 'h1-tag') {
                        echo '<h1>' . get_the_title() . '</h1>';
                    } else if ($new_option_title == 'span-tag') {
                        echo '<span class="h1">' . get_the_title() . '</span>';
                    } elseif ($new_option_title == 'div-tag') {
                        echo '<div class="h1">' . get_the_title() . '</div>';
                    } else {
                        echo '<h1>' . get_the_title() . '</h1>';
                    }
                ?>
                <?php } ?>
                <?php /* if(is_single()) { ?>
                     <ol id="crumbs" class="breadcrumb">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" title="Home">Home</a> </li>
                        <li><a href="<?php echo get_permalink(DEMO_BLOG_PAGE_ID); ?>" title="<?php echo get_the_title(DEMO_BLOG_PAGE_ID); ?>"><?php echo get_the_title(DEMO_BLOG_PAGE_ID); ?></a> </li>
                        <li class="selected"><?php the_title(); ?></li>
                </ol>
                <?php } else { ?>
                        <?php if(function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
                <?php }  */?>
                    </div>
                    </div>
                </section>
        <?php
}
?>