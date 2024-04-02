<section class="get_qualified">
    <div class="container">
        <div class="get_qualified_border">
            <div class="row">

                <?php
                // Check rows exists.
                if (have_rows('hms2_top_info')) {
                    while (have_rows('hms2_top_info')) : the_row();

                        // Load sub field value.
                        $hms2_top_info_item = get_sub_field('hms2_top_info_item');
                        $hms2_top_info_item_subtitle = get_sub_field('hms2_top_info_item_subtitle');
                        // Do something...
                ?>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="arrow_box_content">
                                <div class="arrow_box_text">
                                    <h4><?php echo $hms2_top_info_item; ?></h4>
                                    <h6><em><?php echo $hms2_top_info_item_subtitle; ?></em></h6>
                                </div>
                                <div class="arrow_box_icon">
                                    <li><i class="fas fa-long-arrow-alt-right"></i></li>
                                </div>

                            </div>
                        </div>

                <?php
                    // End loop.
                    endwhile;
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="door_supervisor_course_box">
    <div class="container">
        <div class="row">
            <?php
            // Check rows exists.
            if (have_rows('hms2_course_items')) {
                // Loop through rows.
                while (have_rows('hms2_course_items')) : the_row();

                    // Load sub field value.
                    $hms2_single_course_item = get_sub_field('hms2_single_course_item');
                    $hms2_course_course_url = get_sub_field('hms2_course_course_url');
                    // Do something...
            ?>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="box">
                            <a href="<?php echo $hms2_course_course_url; ?>"><?php echo $hms2_single_course_item; ?></a>
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
<section class="one_stop_solution_text">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="one_stop_header">
                    <?php
                    $hms2_section_large_title = get_field('hms2_section_large_title');
                    if ($hms2_section_large_title) {
                    ?>
                        <h2><?php echo $hms2_section_large_title; ?></h2>
                    <?php
                    }
                    $hms2_large_description = get_field('hms2_large_description');
                    if ($hms2_large_description) {
                    ?>
                        <div class="para_text">
                            <p><?php echo $hms2_large_description; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg_box">
    <div class="container">
        <div class="row">
            <?php
            // Check rows exists.
            if (have_rows('hms2_icons_info')) {
                // Loop through rows.
                while (have_rows('hms2_icons_info')) : the_row();

                    // Load sub field value.
                    $hms2_single_icon_info = get_sub_field('hms2_single_icon_info');
                    $hms2_single_icon_desc = get_sub_field('hms2_single_icon_desc');
                    // Do something...
            ?>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 padd">
                        <div class="bg_box_content">
                            <div class="bg_icon">
                                <img src="<?php echo $hms2_single_icon_info; ?>" alt="">
                            </div>
                            <div class="bg_text">
                                <?php echo $hms2_single_icon_desc; ?>
                            </div>
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