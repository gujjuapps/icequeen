<?php

// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;

function demo_register_public_scripts(){
    
         global $post;
        wp_enqueue_style( 'demo-style-01', get_template_directory_uri() . '/css/bootstrap.min.css', array(), NULL );
        wp_enqueue_style( 'demo-style-08', get_template_directory_uri() . '/css/bootstrap-datepicker3.css', array(), NULL );
        wp_enqueue_style( 'demo-style-02', get_template_directory_uri() . '/css/style.css', array(), NULL );
        wp_enqueue_style( 'demo-style-03', get_template_directory_uri() . '/css/menu_style.css', array(), NULL );
        wp_enqueue_style( 'demo-style-04', get_template_directory_uri() . '/css/owl.carousel.css', array(), NULL );
        wp_enqueue_style( 'demo-style-05', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), NULL );
        wp_enqueue_style( 'demo-style-06', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
        wp_enqueue_style( 'demo-style-07', get_template_directory_uri() . '/css/prettyPhoto.css', array(), NULL );
        wp_enqueue_style( 'demo-style-main', get_stylesheet_uri());

        // jquery loadd
    wp_enqueue_script( 'demo-jquery-01', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-02', get_template_directory_uri() . '/js/bootstrap.min.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-03', get_template_directory_uri() . '/js/bootstrap-datepicker.min.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-04', get_template_directory_uri() . '/js/cbpAnimatedHeader.min.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-05', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-06', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-07', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-08', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), NULL, true );
    
    wp_enqueue_script( 'demo-jquery-09', get_template_directory_uri() . '/js/menu_js.js', array(), NULL, true );
    wp_enqueue_script( 'demo-jquery-10', get_template_directory_uri() . '/js/custom_js.js', array(), NULL, true );
   
    
}
add_action( 'wp_enqueue_scripts', 'demo_register_public_scripts');
?>
