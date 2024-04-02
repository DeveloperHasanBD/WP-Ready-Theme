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
                        <h1><?php echo get_field('team_title'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>