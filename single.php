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
		<hr />
		<footer class="row contentfooter">

				<div class="columns large-6 medium-6">
					<p class="date">Geplaatst op  <? the_time('j M Y'); ?></p>
				</div>
				<div class="columns large-6 medium-6">
					<p class="social alignright">
						Deel dit op:
						<!--Twitter-->
						<a class="twitter button secondairy prefix" href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Deel dit op Twitter!" target="_blank"><i class="social-icon icon-twitter-circled"></i></a>
						<!--Facebook-->
						<a class="facebook button secondairy prefix" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Deel dit op Facebook!" onclick="window.open(this.href); return false;"><i class="social-icon icon-facebook-circled"></i></a>
						<!--LinkedIn-->
						<a class="linkedin button secondairy prefix" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink());?>&title=<?php echo urlencode(strip_tags(html_entity_decode(get_the_title()))); ?>&summary=<?php echo urlencode(strip_tags(html_entity_decode(get_the_excerpt()))); ?>&source=SightsandSounds" title="Deel dit op LinkedIn!" onclick="window.open(this.href); return false;"><i class="social-icon icon-linkedin-circled"></i></a>
						<!--Google Plus-->
						<a class="google-plus button secondairy prefix" title="Deel dit op Google+!" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="social-icon icon-gplus-circled"></i></a>
					</p>
				</div>
			<div class="columns large-8 medium-8 ">

				<?
				$tmppost = $post;
				$related = get_posts(array(
					'post__in'=>get_related_ids($post->ID),
					'post__not_in' => array($post->ID),
					'caller_get_posts'=>1
				));

				$myposts = get_posts($related);

				?>
				<h6>Lees verder:</h6>
				<ul class="relatedlist">
					<?

					foreach ($myposts as $post):
						$i++;
						setup_postdata($post);

						?>
						<li><a href="<? the_permalink();?>"><? the_title()?> <span class="date"> | <? the_date();?></span></a></li>
						<?

					endforeach;

					$post = $tmppost;
					?>
				</ul>



			</div>
			<div class="columns large-4 medium-4 medium-text-right">


				<?php $cat = get_the_category();
				if (!$cat) {
				} else {
					?><h6>Categorie:</h6><?php the_category(''); ?><?php } ?>


				<?php $tag = get_the_tags();
				if (!$tag) {
				} else {
					?><h6>Tag:</h6><p><?php the_tags('', '', ''); ?></p><?php } ?>
			</div>

			<?php //wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>



		</footer>
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

