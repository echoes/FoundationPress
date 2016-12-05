<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

    <div id="page-sidebar-left" role="main">

        <?php do_action( 'foundationpress_before_content' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

                <?php get_template_part( 'template-parts/featured-image' ); ?>
                <div class="entry-wrap">
                    <header>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php foundationpress_entry_meta(); ?>
                    </header>
                    <?php do_action( 'foundationpress_post_before_entry_content' ); ?>
                    <div class="entry-content">



                        <?php the_content(); ?>
                        <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div>

                <?php //the_post_navigation(); ?>
                <?php do_action( 'foundationpress_post_before_comments' ); ?>
                <?php //comments_template(); ?>
                <?php do_action( 'foundationpress_post_after_comments' ); ?>
            </article>
        <?php endwhile;?>

        <?php do_action( 'foundationpress_after_content' ); ?>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer();

