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

function dimox_breadcrumbs() {

    $showOnHome = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $delimiter = '&raquo;'; // разделить между "крошками"
    $home = 'Главная'; // текст ссылка "Главная"
    $showCurrent = 1; // 1 - показывать название текущей статьи/страницы, 0 - не показывать
    $before = '<span class="current">'; // тег перед текущей "крошкой"
    $after = '</span>'; // тег после текущей "крошки"

    global $post;
    $homeLink = get_bloginfo('url');

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

    } else {

        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . '' . single_cat_title('', false) . '' . $after;

        } elseif ( is_search() ) {
            echo $before . 'Результаты поиска по запросу "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . 'Записи с тегом "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Статьи автора ' . $userdata->display_name . $after;

        } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div>';

    }
} // end dimox_breadcrumbs()