<?php
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
    function register_acf_block_types()
    {
        acf_register_block_type(
            array(
                'name'            => 'hm-banner',
                'title'           => 'Home Top Banner',
                'render_template' => 'inc/acf-gutenberg-blocks/home/sec-1.php',
                'category'        => 'redapplehome',
                'icon'            => 'admin-comments',
                'keywords'        => array('Red Apple', 'redapp'),
            )
        );
        // End Home Top Banner
        acf_register_block_type(
            array(
                'name'            => 'hm-team',
                'title'           => 'Home Team',
                'render_template' => 'inc/acf-gutenberg-blocks/home/sec-2.php',
                'category'        => 'redapplehome',
                'icon'            => 'admin-comments',
                'keywords'        => array('Red Apple', 'redapp'),
            )
        );
        // End Home Team

    }
}
