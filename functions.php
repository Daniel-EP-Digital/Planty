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

//DEBUT REMPLACER FOOTER PAR TEMPLATE ID 24
add_action( 'wp_footer', 'my_custom_footer' );
function my_custom_footer() {
    // Vérifier si l'emplacement de footer est défini dans Elementor
    if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) {
        // Récupérer l'identifiant de votre modèle de footer Elementor
        $template_id = 123; // Remplacer 123 par l'identifiant de votre modèle
        // Afficher votre modèle de footer Elementor
        echo '<div class="my-custom-footer">';
        echo \Elementor\Plugin::$instance->frontend->get_builder_content( $template_id, true );
        echo '</div>';
    }
}

// DEBUT REMPLACER FOOTER PAR TEMPLATE ID 24