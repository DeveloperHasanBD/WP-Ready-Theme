<!-- section_start -->
<section class="hero_slide">
    <div class="banner owl-carousel owl-theme">
        <?php
        if (have_rows('hmslp1_section_one_slider')) {
            while (have_rows('hmslp1_section_one_slider')) : the_row();
                $hms1_slider_item_img = get_sub_field('hms1_slider_item_img');
                $hms1_slider_item_title = get_sub_field('hms1_slider_item_title');
                $hms1_slider_item_desc = get_sub_field('hms1_slider_item_desc');
        ?>
                <div class="item">
                    <div class="top_img_slide_item">
                        <img src="<?php echo $hms1_slider_item_img; ?>" alt="">
                        <div class="top_img_slide_item_text">
                            <h1><?php echo $hms1_slider_item_title; ?></h1>
                            <p><?php echo $hms1_slider_item_desc; ?></p>
                        </div>
                    </div>
                    <div class="image_text">
                        <h1><?php echo $hms1_slider_item_title; ?></h1>
                        <p><?php echo $hms1_slider_item_desc; ?></p>
                    </div>
                    <div class="last_img_slide_item">
                        <img src="<?php echo $hms1_slider_item_img; ?>" alt="">
                    </div>
                </div>
        <?php
            endwhile;
        }
        ?>

    </div>
</section>