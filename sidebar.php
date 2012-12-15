<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
        <?php if ( category_description() ) { // Show an optional category description ?>
            <div class="archive-meta"><?php echo category_description(); ?></div>
            <?php } else{ ?>
            <?php the_content(null, true); ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php } ?>
		</div><!-- #secondary -->
	<?php endif; ?>