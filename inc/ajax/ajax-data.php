<?php

add_action('wp_ajax_collection_term_action', 'collection_term_action');
add_action('wp_ajax_nopriv_collection_term_action', 'collection_term_action');
function collection_term_action()
{

    $term_id            = intval($_POST['term_id']) ?? '';
    $term_url           = get_term_link($term_id);
    $term_details       = get_term($term_id);
    $term_name          = $term_details->name ?? '';
    $term_slug          = $term_details->slug ?? '';
    $get_term_img_id    = get_term_meta($term_id, 'col_trm_image', true);
    $get_term_img_url   = wp_get_attachment_image_url($get_term_img_id, 'full');

    $html = '';
    $html .= '
        <img src="' . $get_term_img_url . '" alt="">
        <div class="category-tag display_term_name"><a href="' . $term_url . '"></a>' . $term_name . '</div>
    ';

    $response['data'] = $html;
    echo json_encode($response);
    die;
}


add_action('wp_ajax_get_post_filter_posts', 'get_post_filter_posts');
add_action('wp_ajax_nopriv_get_post_filter_posts', 'get_post_filter_posts');

function get_post_filter_posts()
{
    $response['error']      = false;
    $response['message']    = 'Success';
    $response['data']       = '';
    $category               = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    $categories             = array('all', 'news', 'events');
    if (!in_array($category, $categories)) {
        $response['error']      = true;
        $response['message']    = 'Something wrong!';
    }
    // session_start();
    // $_SESSION['home_post_filter'] = $category;
    if ($category == 'news') {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => 41
                )
            )
        );
    } elseif ($category == 'events') {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => 42
                )
            )
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish'
        );
    }
    $posts_query = new WP_Query($args);
    $html = '';
    if ($posts_query->have_posts()) {
        // Start the Loop.
        while ($posts_query->have_posts()) {
            $posts_query->the_post();
            $link       = get_the_permalink();
            $thumb      = get_template_directory_uri() . "/assets/images/news/news.png";
            if (has_post_thumbnail()) {
                $thumb  = get_the_post_thumbnail_url();
            }
            $title      = get_the_title();
            $subtitle   = get_field('post_sub_title', get_the_ID(),);
            $subdescription = get_field('post_sub_description', get_the_ID(),);
            $subdescription = wp_trim_words($subdescription, 15, true);
            $html .= "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-6 custom-col'>
                        <div class='card'>
                            <div class='row g-0'>
                                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                                    <div class='news-image-box'>
                                        <a href='" . $link . "'>
                                            <img src='" . $thumb . "' style='height: 250px !important;width: 100%;'>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                                    <div class='card-body'>
                                        <div class='news-short-box'>
                                            <h4><a href=" . $link . ">" . $title . "</a></h4>
                                            <h6>" . $subtitle . "</h6>
                                            <p>" . $subdescription . "...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
    }
    $response['data'] = $html;
    echo json_encode($response);
    die;
}
