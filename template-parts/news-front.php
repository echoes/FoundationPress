

<?php  $tmp_post = $post; ?>

<div id="news-row" class="full">
    <h1>Nieuws</h1>
        <div class="news-wrapper row">
            <div class="orbit" role="region" aria-label="Nieuws" data-orbit>
            <ul class="orbit-container">
                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

                <?php
                global $post;
                //$tmp_post = $post;
                $args = array('numberposts' => 6, 'post__not_in' => array( get_the_ID()));//, 'cat' => 1 //get 4 posts where id is not current id
                $myposts = get_posts($args);

                //print_r($myposts);
                //$post = $myposts[0];

                $i = 0;

                foreach ($myposts as $post) :  setup_postdata($post);

                    $post_thumbnail_id = get_post_thumbnail_id();
                    $featured_src = wp_get_attachment_image_src($post_thumbnail_id, 'fp-small');
                    $post_thumbnail = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'fp-small' ));


                    if($i == 0){
                        echo '<li class="orbit-slide"><div class="row">';
                        //$i = 0;
                    }
                    $i++;


                    ?>
                        <div class="columns small-6">
                            <a href="<?php the_permalink(); ?>">

                                    <h2><?php the_title(); ?></h2>
                                    <?=$post_thumbnail; ?>
                                    <p class="show-for-medium"><?php echo strip_tags(get_the_excerpt()); ?></p>
                            </a>
                        </div>
                    <?php if($i == 2){
                    echo '</div></li>';
                        $i = 0;
                        }
                        ?>

                <?php   endforeach;

                $post = $tmppost;

                ?>

            </ul>
                </div>


        </div>

</div>
