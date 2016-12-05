<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<hr />
<div class="row">
	<div class="columns large-12 small-12 small-centered">
		<a href="<?php the_permalink(); ?>">

			<div class="columns large-3 medium-3 small-3 nopadding left">
				<?php if (has_post_thumbnail()): ?>
					<?php echo the_post_thumbnail(); ?>
				<? endif; ?>
			</div>
			<div class="columns large-9 medium-9 small-9">
				<div class="row">
					<div class="columns large-9 medium-8">

						<h3><?php the_title(); ?></h3>
					</div>
					<div class="columns large-3 medium-4">
						<p class="date">Geplaatst op  <? the_time('j M Y'); ?></p>
					</div>
				</div>
				<span class="show-for-medium-up"><?php the_excerpt(); ?></span> <!--<span class="readmore">Lees verder</span>-->
			</div>

		</a>
	</div>
</div>
