<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

// Hook WP NAV MENU is user log in show admin page

add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location === 'menu-1') {
        $items .= '<li><a class="menu-item" href="'. admin_url() .'">Admin</a></li> <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-9 current_page_item menu-item-11"><a href="http://planty.local/commander/" aria-current="page">Commander</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location === 'menu-1') {
        $items .= '<li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-9 current_page_item menu-item-11"><a href="http://planty.local/commander/" aria-current="page">Commander</a></li>';
    }
    return $items;
}