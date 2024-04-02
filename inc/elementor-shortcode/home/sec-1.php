<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class HmBanner extends Widget_Base
{


    public function get_name()
    {
        return 'hm-banner';
    }


    public function get_title()
    {
        return __('Home Banner', 'redapple');
    }


    public function get_icon()
    {
        return 'eicon-circle';
    }

    // public function get_icon()
    // {
    //     return get_template_directory_uri() . '/assets/images/vc-icon.png';
    // }


    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the image widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @since 2.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['redapple-hm-elements'];
    }

    protected function _register_controls()
    {

        //banner top
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Banner slider', 'redapple'),
            ]
        );

        $this->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'label' => esc_html__('Title', 'redapple'),
                'placeholder' => esc_html__('Enter your title', 'redapple'),
            ],
        );

        $this->add_control(
            'description',
            [
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'label' => esc_html__('Description', 'redapple'),
                'placeholder' => esc_html__('Enter your title', 'redapple'),
            ],
        );


        $this->end_controls_section();
    }

    /**
     * Render image widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        $title      = $settings['title'];
        $description      = $settings['description'];
?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h2><?php echo $title; ?></h2>
                </div>
                <div class="col-md-6">
                    <h2><?php echo $description; ?></h2>
                </div>
            </div>
        </div>

<?php
    }

    /**
     * Render image widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
    }
}
