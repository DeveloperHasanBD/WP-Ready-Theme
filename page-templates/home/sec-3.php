<section class="latest_article_box">
    <div class="container">
        <div class="row">
            <div class="articles text_center">
                <h2>LASTEST ARTICLES</h2>

            </div>
        </div>
    </div>
</section>
<section class="latest_article_box">
    <div class="latest_article">
        <div class="container">
            <div class="latest_articles owl-carousel banner1">

                <?php
                $arg = new WP_Query([
                    'post_type' => 'post',
                ]);
                while ($arg->have_posts()) {
                    $arg->the_post();
                ?>
                    <div class="item">
                        <?php
                        if (has_post_thumbnail()) {
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
                        ?>
                            <img src="<?php echo $large_image_url[0]; ?>" />
                        <?php } ?>
                        <div class="date_number">
                            <h6><?php the_date('d-m-Y'); ?></h6>
                        </div>
                        <div class="banner_text">
                            <div class="sia_button"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <p><?php echo wp_trim_words(get_the_content(), 15, true); ?></p>
                            <button class="btn_dgn"><a href="<?php the_permalink(); ?>">READ MORE</a></button>
                        </div>
                    </div>
                <?php
                }
                wp_reset_query();
                ?>



            </div>
        </div>
    </div>
</section>