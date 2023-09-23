<?php

require_once get_theme_file_path("/lib/csf/cs-framework.php");
require_once get_theme_file_path("/inc/metaboxes/section.php");

define('CS_ACTIVE_FRAMEWORK', false); //default true
define('CS_ACTIVE_METABOX', true); //default true
define('CS_ACTIVE_TAXONOMY', false); //default true
define('CS_ACTIVE_SHORTCODE', false); //default true
define('CS_ACTIVE_CUSTOMIZE', false); //default true

if(site_url() == "http://localhost/meal/"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}

function meal_theme_setup(){
    load_theme_textdomain('meal', get_template_directory().'/languages');

    add_theme_support('post-thumbnails');
    add_theme_support('title-tags');
    add_theme_support('automatic-feed-linkks');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'gallery',
        'caption',
        'comment-list'
    ));
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'meal_theme_setup');

function meal_assets(){
    // Styles
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', null, '1.0');
    wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css', null, '1.0');
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css', null, '1.0');
    wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css', null, '1.0');
    wp_enqueue_style('aos', get_template_directory_uri().'/assets/css/aos.css', null, '1.0');
    wp_enqueue_style('bootstrap-datepicker', get_template_directory_uri().'/assets/css/bootstrap-datepicker.css', null, '1.0');
    wp_enqueue_style('jquery-timepicker', get_template_directory_uri().'/assets/css/jquery.timepicker.css', null, '1.0');
    wp_enqueue_style('ionicons', get_template_directory_uri().'/assets/fonts/ionicons/css/ionicons.min.css', null, '1.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/fonts/fontawesome/css/font-awesome.min.css', null, '1.0');
    wp_enqueue_style('flaticon', get_template_directory_uri().'/assets/fonts/flaticon/font/flaticon.css', null, '1.0');
    wp_enqueue_style('portfolio', get_template_directory_uri().'/assets/css/portfolio.css', null, '1.0');
    wp_enqueue_style('style', get_template_directory_uri().'/assets/css/style.css', null, '1.0');
    wp_enqueue_style('meal-style', get_stylesheet_uri());

    // JavaScripts
    wp_enqueue_script('popper', get_template_directory_uri().'/assets/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-waypoints', get_template_directory_uri().'/assets/js/jquery.waypoints.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/assets/js/bootstrap-datepicker.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-timepicker', get_template_directory_uri().'/assets/js/jquery.timepicker.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-stellar', get_template_directory_uri().'/assets/js/jquery.stellar.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri().'/assets/js/jquery.easing.1.3.js', array('jquery'), '1.0', true);
    wp_enqueue_script('aos', get_template_directory_uri().'/assets/js/aos.js', array('jquery'), '1.0', true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri().'/assets/js/imagesloaded.js', array('jquery'), '1.0', true);
    wp_enqueue_script('isotope-pkgd', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-isotope', get_template_directory_uri().'/assets/js/jquery.isotope.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('magnific-popup-options', get_template_directory_uri().'/assets/js/magnific-popup-options.js', array('jquery'), '1.0', true);
    wp_enqueue_script('google-map', '//maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s', null, '1.0', true);
    wp_enqueue_script('portfolio', get_template_directory_uri().'/assets/js/portfolio.js', array('jquery', 'jquery-magnific-popup', 'imagesloaded', 'isotope-pkgd'), '1.0', true);
    wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'meal_assets');


// Codestar initialization
function meal_codestar_init(){
    CSFramework_Metabox::instance(array());
}
add_action('init', 'meal_codestar_init');