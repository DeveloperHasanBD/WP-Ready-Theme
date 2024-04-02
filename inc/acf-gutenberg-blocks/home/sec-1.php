<?php
$className = 'redapple';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

if (function_exists('get_field')) {
?>
    <div class="hm_home_page_top_banner <?php echo esc_attr($className) ?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="hm_home_page_top_banner_inner">
                        <h2><?php echo get_field('banner_title'); ?></h2>
                        <img src="<?php echo get_field('banner_image'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>