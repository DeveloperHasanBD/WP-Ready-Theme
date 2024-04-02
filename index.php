<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
// if (function_exists('bcn_display')) {
// 	bcn_display();
// }
?>

<div class="h_urbn_main_blog_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <?php
                if (have_posts()) {
                    // Start the Loop.
                    while (have_posts()) {
                        the_post();

                        /*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
                        get_template_part('loop-templates/content', get_post_format());
                    }
                } else {
                    get_template_part('loop-templates/content', 'none');
                }
                ?>
                <?php understrap_pagination(); ?>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4"></div>
        </div>
    </div>
</div>


<?php
get_footer();
