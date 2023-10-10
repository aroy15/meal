<?php

require_once get_theme_file_path("/lib/csf/cs-framework.php");
require_once get_theme_file_path("/inc/metaboxes/section.php");
require_once get_theme_file_path("/inc/metaboxes/recipe.php");
require_once get_theme_file_path("/inc/metaboxes/page.php");
require_once get_theme_file_path("/inc/metaboxes/pricing.php");
require_once get_theme_file_path("/inc/metaboxes/section-banner.php");
require_once get_theme_file_path("/inc/metaboxes/section-featured.php");
require_once get_theme_file_path("/inc/metaboxes/section-gallery.php");
require_once get_theme_file_path("/inc/metaboxes/section-chef.php");
require_once get_theme_file_path("/inc/metaboxes/section-services.php");
require_once get_theme_file_path("/inc/metaboxes/taxonomy-featured.php");

define('CS_ACTIVE_FRAMEWORK', false); //default true
define('CS_ACTIVE_METABOX', true); //default true
define('CS_ACTIVE_TAXONOMY', true); //default true
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

    register_nav_menu('primary', __('Main menu', 'meal'));
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
    // MailChimp
    // wp_enqueue_style('','//cdn-images.mailchimp.com/embedcode/classic-061523.css');
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
    wp_enqueue_script('meal-loadmore-js', get_template_directory_uri().'/assets/js/loadmore.js', array('jquery'), VERSION, true);
    wp_enqueue_script('portfolio', get_template_directory_uri().'/assets/js/portfolio.js', array('jquery', 'jquery-magnific-popup', 'imagesloaded', 'isotope-pkgd'), VERSION, true);

    // Mailchimp
    if(is_page_template('page-templates/mailchimp.php')){
        wp_enqueue_style('mailchimp-css', '//cdn-images.mailchimp.com/embedcode/classic-061523.css');
        $style = <<<EOD
        #mc_embed_signup{
            background:#fff; 
            clear:left; 
            font:14px Helvetica,Arial,sans-serif; 
            width: 600px;
        }
        EOD;
        wp_enqueue_style('mailchimp-css', $style);
        wp_enqueue_script('mailchimp-js', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', null, '1.0', true );
        $script = <<<EOD
        (function($) {
            window.fnames = new Array(); 
            window.ftypes = new Array();
            fnames[0]='EMAIL';ftypes[0]='email';
            fnames[1]='FNAME';ftypes[1]='text';
            fnames[2]='LNAME';ftypes[2]='text';
            fnames[4]='PHONE';ftypes[4]='phone';
            fnames[3]='ADDRESS';ftypes[3]='address';
            fnames[5]='BIRTHDAY';ftypes[5]='birthday';
        }(jQuery));
        var \$mcj = jQuery.noConflict(true);
        EOD;
        wp_add_inline_script('mailchimp-js', $script);
    }
    
    wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);

    if(is_page_template('page-templates/landing.php')){
        wp_enqueue_script('meal-reservation-js', get_template_directory_uri().'/assets/js/reservation.js', array('jquery'), VERSION, true);
        wp_enqueue_script('meal-contact-js', get_template_directory_uri().'/assets/js/contact.js', array('jquery'), VERSION, true);
        $ajaxurl = admin_url('admin-ajax.php');
        wp_localize_script('meal-reservation-js', 'mealurl', array('ajaxurl' => $ajaxurl));
        wp_localize_script('meal-contact-js', 'mealurl', array('ajaxurl' => $ajaxurl));
        wp_localize_script('portfolio', 'mealurl', array('ajaxurl'=>$ajaxurl));
    }
}
add_action('wp_enqueue_scripts', 'meal_assets');


// Codestar initialization
function meal_codestar_init(){
    CSFramework_Metabox::instance(array());
    CSFramework_Taxonomy::instance(array());
}
add_action('init', 'meal_codestar_init');

function get_recipe_category($recipe_id){
    $terms = wp_get_post_terms($recipe_id, "category");
    if($terms){
        $first_term = array_shift($terms);
        return $first_term->name;
    }
    return "Food";
}

function meal_process_reservation(){
    if(check_ajax_referer('reservation', 'rn')){
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_text_field($_POST['email']);
        $persons = sanitize_text_field($_POST['persons']);
        $phone = sanitize_text_field($_POST['phone']);
        $date = sanitize_text_field($_POST['date']);
        $time = sanitize_text_field($_POST['time']);

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'persons' => $persons,
            'date' => $date,
            'time' => $time
        );

        // print_r($data);

        $reservation_arguments = array(
            'post_type' => 'reservation',
            'post_author' => 1,
            'post_date' => date('Y-m-d h:i:s'),
            'post_status' => 'publish',
            'post_title' => sprintf('%s - Reservation for %s persons on %s - %s', $name, $persons, $date." : ".$time, $email ),
            'meta_input' => $data
        );
        $reservations = new WP_Query(array(
            'post_type' => 'reservation',
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                'email_check' => array(
                    'key' => 'email',
                    'value' => $email
                ),
                'date_check' => array(
                    'key' => 'date',
                    'value' => $date
                ),
                'time_check' => array(
                    'key' => 'time',
                    'value' => $time
                )
            )
        ));
        if($reservations->found_posts>0){
            echo "duplicate";
            die();
        }else{
            $wp_error = '';
            $reservation_id = wp_insert_post($reservation_arguments, $wp_error);

            // Transient check
            $reservation_count = get_transient('res_count') ? get_transient('res_count') : 0;
            
            // Transient check End
            if(!$wp_error){
                $reservation_count++;
                set_transient('res_count', $reservation_count, 0); // third parameter zero means it will not expire
                $_name = explode(" ", $name);
                $order_data = array(
                    'first_name' => $_name[0],
                    'last_name' => isset($_name[1]) ? $_name[1] : '',
                    'email' => $email,
                    'phone' => $phone,
                );
                $order = wc_create_order();
                $order->set_address($order_data);
                $order->add_product(wc_get_product(75), 1);
                $order->set_customer_note($reservation_id);
                $order->calculate_totals();

                add_post_meta($reservation_id, 'order_id', $order->get_id());

                echo $order->get_checkout_payment_url();
            }
        }
    }else{
        echo 'not allowed';
    }
    die();
}
add_action('wp_ajax_reservation', 'meal_process_reservation');
add_action('wp_ajax_nopriv_reservation', 'meal_process_reservation');

function meal_checkout_fields($fields){
    // Remove billing fields
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);

    // remove shipping fields
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);

    // remove order comment fields
    unset($fields['order']['order_comments']);

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'meal_checkout_fields');

function meal_order_status_processing($order_id){
    $order = wc_get_order($order_id);
    $reservation_id = $order->get_customer_note();
    if($reservation_id){
        $reservation = get_post($reservation_id);
        wp_update_post(array(
            'ID' => $reservation_id,
            'post_title' => "[Paid] - ".$reservation->post_title
        ));
        add_post_meta($reservation_id, 'paid', 1);
    }
}
add_filter('woocommerce_order_status_processing', 'meal_order_status_processing');

function meal_change_menu($menu){
    $reservation_count = get_transient('res_count') ? get_transient('res_count') : 0;
    if($reservation_count > 0){
        $menu[4][0] = "Reservation <span class='awaiting-mod'>{$reservation_count}</span>";
    }
    return $menu;
}
add_filter('add_menu_classes', 'meal_change_menu');

function meal_admin_scripts($screen){
    $_screen = get_current_screen();
    if('edit.php' == $screen && 'reservation' == $_screen->post_type){
        delete_transient('res_count');
    }
}
add_action('admin_enqueue_scripts', 'meal_admin_scripts');

function meal_contact_email(){
    $name = isset($_POST['cname']) ? $_POST['cname'] : '';
    $email = isset($_POST['cemail']) ? $_POST['cemail'] : '';
    $phone = isset($_POST['cphone']) ? $_POST['cphone'] : '';
    $message = isset($_POST['cmessage']) ? $_POST['cmessage'] : '';

    $_message = sprintf("%s \nFrom: %s\nEmail: %s\nPhone: %s", $message, $name, $email, $phone);
    $admin_email = get_option('admin_email');
    // wp_mail function parameters: to, subjuct, email data/message, from
    wp_mail($admin_email, __('Someone tried to contact you', 'meal'), $_message, "From: {$admin_email}\r\n");
    die('Successful');
}
add_action('wp_ajax_contact', 'meal_contact_email');
add_action('wp_ajax_nopriv_contact', 'meal_contact_email');

// Menu Item Replace
function meal_change_nav_menu($menus){
    $string_to_replace = home_url("/")."section/";
    if(is_front_page()){
        foreach($menus as $menu){
            $new_url = str_replace($string_to_replace, "#", $menu->url);

            if($new_url != $menu->url){
                $new_url = rtrim($new_url, "/");
            }

            $menu->url = $new_url;
        }
    }
    return $menus;    
}
add_filter('wp_nav_menu_objects', 'meal_change_nav_menu');

// Comments field re-order
function meal_comment_form_fields($fields){
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] =  $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'meal_comment_form_fields');

// Pricing Items
function mea_process_pricing_item($item){
    if(trim($item) == '1'){
        return '<i class="fa fa-check plan-active-color fa-2x" aria-hidden="true"></i>';
    }elseif(trim($item) == '0'){
        return '<i class="fa fa-ellipsis-h plan-inactive-color fa-2x" aria-hidden="true"></i>';
    }
    return $item;
}
add_filter('meal_pricing_item', 'mea_process_pricing_item');

function get_max_page_number(){
    global $wp_query;
    return $wp_query->max_num_pages;
} 

// Load More portfolio items using ajax
function meal_load_portfolio_items(){
    if(wp_verify_nonce($_POST['nonce'], 'loadmorep')){
        $meal_section_id = $_POST['sid'];        
        $meal_offset = $_POST['offset'];        
        $meal_section_meta = get_post_meta($meal_section_id, 'meal-section-gallery', true);
        $meal_number_of_images = $meal_section_meta['nimages'];

        $meal_gallery_items =  $meal_section_meta['portfolio'];
        $meal_gallery_items = array_slice($meal_gallery_items, $meal_offset);
        $meal_counter = 0;

        echo "<div class='portfolio'>";
        foreach($meal_gallery_items as $meal_gallery_item):                        
            if($meal_counter>= $meal_number_of_images){
                break;
            }
            $meal_item_class = str_replace(",", " ", $meal_gallery_item['categories']);
            $meal_item_image_id = $meal_gallery_item['image'];
            $meal_item_thumbnail = wp_get_attachment_image_src($meal_item_image_id, 'medium')[0];
            $meal_item_large = wp_get_attachment_image_src($meal_item_image_id, 'large')[0];
        ?>
        <div class="portfolio-item <?php echo esc_attr($meal_item_class);?>">
            <a href="<?php echo esc_url($meal_item_large);?>" class="portfolio-image popup-gallery">
                <img src="<?php  echo esc_url($meal_item_thumbnail);?>" alt="" />
                <div class="portfolio-hover-title">
                    <div class="portfolio-content">
                        <h4><?php echo esc_html($meal_gallery_item['title']);?></h4>
                        <div class="portfolio-category">
                            <?php
                            // foreach($meal_item_categories_array as $meal_item_category){
                            //     printf("<span>%s</span>", trim($meal_item_category));
                            // }
                            printf("<span>%s</span>", trim($meal_gallery_item['categories']));
                            ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php 
            $meal_counter++;
        endforeach;
        echo "</div>";
    }

    die();
}
add_action('wp_ajax_loadmorep', 'meal_load_portfolio_items');
add_action('wp_ajax_nopriv_loadmorep', 'meal_load_portfolio_items');