<?php
add_action('vc_before_init', 'redp_home_sec_1_backend');
function redp_home_sec_1_backend()
{

    vc_map(
        array(
            "name"          => __("Home main Slider", "redapple"), // Element name
            "base"          => "redp_home_sec_1", // Element shortcode
            'icon'          => get_template_directory_uri() . '/assets/images/logo-dark.png',
            'description'   => 'Dedicated for redapple',
            "class"         => "redapple-cstm",
            "category"      => __('Home', 'redapple'),
            "params"        => array(
                // array(
                //     "type"          => "vc_link",
                //     "heading"       => "URL",
                //     "param_name"    => "ptk_s2_url",
                // ),
                array(
                    "type"          => "textarea_raw_html",
                    "heading"       => "Map",
                    "param_name"    => "sec3_cont_iframe_map",
                ),
                array(
                    "type"          => "param_group",
                    "heading"       => "Home main slider",
                    "param_name"    => "home_main_slider",
                    "value"         => "",
                    "params" => array(
                        array(
                            "type"                      => "dropdown",
                            "heading"                   => "Show Additional Options",
                            "param_name"                => "show_hide_text_video",
                            "value"                     => array(
                                "Default Text slider"   => "yes",
                                "Choose Video slider"   => "no",
                            ),
                        ),
                        array(
                            "type"          => "attach_image",
                            "heading"       => "Slide image",
                            "param_name"    => "text_slide_image",
                            "dependency"    => array(
                                "element"   => "show_hide_text_video",
                                "value"     => "yes",
                            ),
                        ),
                        array(
                            "type"          => "textarea",
                            "heading"       => "Slide text",
                            "param_name"    => "slide_image_text",
                            "dependency"    => array(
                                "element"   => "show_hide_text_video",
                                "value"     => "yes",
                            ),
                        ),
                        array(
                            "type"          => "textfield",
                            "heading"       => "Video URL",
                            "param_name"    => "video_url",
                            "dependency"    => array(
                                "element"   => "show_hide_text_video",
                                "value"     => "no",
                            ),
                        ),
                        array(
                            "type"          => "textarea",
                            "heading"       => "Video text",
                            "param_name"    => "video_text",
                            "dependency"    => array(
                                "element"   => "show_hide_text_video",
                                "value"     => "no",
                            ),
                        ),
                    ),
                ),
            ),
        )
    );
}

add_shortcode('redp_home_sec_1', 'redp_home_sec_1_view');

function redp_home_sec_1_view($atts)

{
    ob_start();
    $atts = shortcode_atts(array(
        'home_main_slider'     => '',
        // 'ptk_s2_url'        => '',
    ), $atts, 'redp_home_sec_1');

    $slide_items = vc_param_group_parse_atts($atts['home_main_slider']);
    // $ptk_s2_url     = vc_build_link($atts['ptk_s2_url']) ?? '';
    // $sec3_cont_iframe_map       = rawurldecode(base64_decode($atts['sec3_cont_iframe_map']));
?>
    <!-- home slider start from here  -->
    <section class="home-slider-main">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <?php
                foreach ($slide_items as $single_slide) {
                    $show_hide_text_video   = $single_slide['show_hide_text_video'] ?? '';


                    if ($show_hide_text_video == 'yes') {
                        $text_slide_img_id       = $single_slide['text_slide_image'] ?? '';
                        $text_slide_img_url      = wp_get_attachment_image_url($text_slide_img_id, 'full');
                        $slide_image_text        = $single_slide['slide_image_text'] ?? '';
                ?>
                        <div class="swiper-slide">
                            <div class="slide-bg" style="background: url(<?php echo $text_slide_img_url; ?>"> </div>
                            <div class="slider-cotentbox">
                                <h2><?php echo $slide_image_text; ?></h2>
                            </div>
                        </div>
                    <?php
                    } else {
                        $video_url  = $single_slide['video_url'] ?? '';
                        $video_text = $single_slide['video_text'] ?? '';
                    ?>
                        <div class="swiper-slide video-slide" data-swiper-autoplay="">
                            <div class="video-bg">
                                <video autoplay muted loop class="swiper-video">
                                    <source src="<?php echo $video_url; ?>" type="video/mp4">
                                </video>
                                <div class="slider-cotentbox">
                                    <h2><?php echo $video_text; ?></h2>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>
    <!-- home slider ends here  -->

<?php

    $result = ob_get_clean();

    return $result;
}
