<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside class="sidebar">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<article id="logo-sidebar" class="widget logo-sidebar show-for-large">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_cornax.svg" />
		</article>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
