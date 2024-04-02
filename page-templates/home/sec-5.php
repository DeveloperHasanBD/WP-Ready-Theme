<section class="upper_footer_image">
    <div class="container">
        <div class="row">
            <?php
            // Check rows exists.
            if (have_rows('hms5_logos')) {
                // Loop through rows.
                while (have_rows('hms5_logos')) : the_row();

                    // Load sub field value.
                    $hms4_logo_item = get_sub_field('hms4_logo_item');
                    // Do something...
            ?>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="image_box">
                            <img src="<?php echo $hms4_logo_item; ?>" alt="">
                        </div>
                    </div>
            <?php
                // End loop.
                endwhile;
            }
            ?>

        </div>
    </div>
</section>