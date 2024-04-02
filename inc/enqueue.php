<?php

/**
 * redapple enqueue scripts
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function understrap_scripts()
    {
        // Get the theme data.
        $theme_version = time();

        wp_enqueue_style('enq-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version);
        wp_enqueue_style('enq-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), $theme_version);
        wp_enqueue_style('enq-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), $theme_version);
        wp_enqueue_style('enq-slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), $theme_version);
        wp_enqueue_style('enq-swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.css', array(), $theme_version);
        wp_enqueue_style('enq-style', get_template_directory_uri() . '/assets/css/style.css', array(), $theme_version);
        wp_enqueue_style('enq-theme-style', get_stylesheet_uri());


        wp_enqueue_script('jquery');


        wp_enqueue_script('enq-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-parallax', get_template_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js', array(), $theme_version, true);
        wp_enqueue_script('enq-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array(), $theme_version, true);
        wp_enqueue_script('enq-swiper-bundle-min', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), $theme_version, true);
        wp_enqueue_script('enq-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.js', array(), $theme_version, true);

        wp_enqueue_script('enq-ajax-data', get_template_directory_uri() . '/assets/js/ajax-data.js', array(), $theme_version, true);


        wp_localize_script('enq-ajax-data', 'action_url_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);


        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');
