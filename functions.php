<?php
/**
 * Created by Sergey Polischook.
 */
function aries_setup() {
    add_theme_support( 'post-formats', array( 'gallery' ) );
}
add_action( 'after_setup_theme', 'aries_setup' );

// свой класс построения меню:
class magomra_walker_nav_menu extends Walker_Nav_Menu {
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "<ul class='sub-nav-menu'>\n";
          query_posts( 'cat='.$item->object_id );
             // The Loop
            while ( have_posts() ) : the_post();
                $output.= '<li>';
                $output.= '<a href="';
                $output.= get_permalink();
                $output.= '">';
                $output.= the_title('','',false);
                $output.= '</a>';
                $output.= '</li>';
            endwhile;

            // Reset Query
            wp_reset_query();
        $output .= "</ul>\n";

        $output .= "</li>\n";
//        print_r($item); exit;
    }
}