<?php

// If a feature image is set, get the id, so it can be injected as a css background property
if (has_post_thumbnail($post->ID)) :
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $image = $image[0];

    if (is_front_page()) {
        $pageclass = 'isfront';
    } else {
        $pageclass = 'nofront';
    }
    ?>

    <header id="featured-hero" class="<?php echo $pageclass; ?>" role="banner"
            style="background-image: url('<?php echo $image ?>')">
        <div class="row" id="featured-links">
            <div class="columns small-4">
                <a href="#" class="featured-icon-href img-href">
                    <span>onderhoud</span>
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/cornax_rietdekker-icon_onderhoud.svg"
                        class="featured-icon"/>
                </a>
            </div>
            <div class="columns small-4">
                <a href="#" class="featured-icon-href img-href">
                    <span>nanocoating</span>
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/cornax_rietdekker-icon_nanocoating.svg"
                        class="featured-icon"/>
                </a>
            </div>
            <div class="columns small-4">
                <a href="#" class="featured-icon-href img-href">
                    <span>brandveiligheid</span>
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/cornax_rietdekker-icon_brandveiligheid.svg"
                        class="featured-icon"/>
                </a>
            </div>
        </div>
    </header>

<?php endif;
