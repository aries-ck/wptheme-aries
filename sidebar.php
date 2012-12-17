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
            <?php
            // Custom sidebar with category description
            if ( category_description() ) { // Show an optional category description ?>
                <div class="archive-meta"><?php echo category_description(); ?></div>
            <?php }

            // Custom sidebar with terms of sale action
            elseif (in_category('sale')) {
                echo category_description( get_category_by_slug('sale')->term_id);
            }

            // Custom sidebar with description of portfolio
            else{ ?>
            <?php the_content(null, true); ?>
            <?php dynamic_sidebar( 'sidebar-1' );
            } ?>

		</div><!-- #secondary -->
	<?php endif; ?>