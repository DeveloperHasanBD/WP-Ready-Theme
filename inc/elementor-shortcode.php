<?php

if (!defined('ABSPATH')) exit;

class Xs_Shortcode
{

    /**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;

    /**
     * Load Construct
     * 
     * @since 1.0
     */

    public function __construct()
    {

        add_action('elementor/init', array($this, 'xs_elementor_init'));

        add_action('elementor/widgets/widgets_registered', array($this, 'xs_shortcode_elements'));
    }


    /**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function xs_elementor_init()
    {
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'redapple-hm-elements',
            [
                'title' => esc_html__('redapple Home', 'redapple'),
                'icon' => 'fa fa-plug',
            ],
            1
        );

    }




    public function xs_shortcode_elements($widgets_manager)
    {

        require_once get_template_directory() . '/inc/elementor-shortcode/home/sec-1.php';
        require_once get_template_directory() . '/inc/elementor-shortcode/home/sec-2.php';

        $widgets_manager->register_widget_type(new Elementor\HmBanner());
        $widgets_manager->register_widget_type(new Elementor\HmDestination());
    }

    public static function xs_get_instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Xs_Shortcode();
        }
        return self::$_instance;
    }
}
$Xs_Shortcode = Xs_Shortcode::xs_get_instance();
