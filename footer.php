<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) : ?>
    <div class="my-custom-footer">
        <?php
        // Récupérer l'identifiant de votre modèle de footer
        $template_id = post-24; // Remplacer 123 par l'identifiant de votre modèle
        // Afficher votre modèle de footer
        echo \Elementor\Plugin::$instance->frontend->get_builder_content( $template_id, true );
        ?>
    </div>
<?php else :
	if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
		get_template_part( 'template-parts/dynamic-footer' );
	} else {
		get_template_part( 'template-parts/footer' );
	}
endif; ?>

<?php wp_footer(); ?>

</body>
</html>