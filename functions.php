<?php


// custom slick post slider for media page
// only features category post will be shown here
function csk_custom_slider(){

	ob_start();

	get_template_part( 'template-parts/slider');
	
	$my_variable  = ob_get_clean();

	return $my_variable;
}

add_shortcode( 'csk_post_slider', 'csk_custom_slider' );

// custom slick post slider for media page
// only features category post will be shown here
function csk_post_cat_release(){

	ob_start();

	get_template_part( 'template-parts/press');
	
	$my_variable  = ob_get_clean();

	return $my_variable;
}

add_shortcode( 'csk_release_post', 'csk_post_cat_release' );

// custom slick post slider for media page
// only features category post will be shown here
function csk_post_cat_media(){

	ob_start();

	get_template_part( 'template-parts/media');
	
	$my_variable  = ob_get_clean();

	return $my_variable;
}

add_shortcode( 'csk_media_post', 'csk_post_cat_media' );

// to show newsletter button on the homepage

function csk_newsletter(){

	ob_start();

	get_template_part( 'template-parts/newsletter');
	
	$my_variable  = ob_get_clean();

	return $my_variable;
}

add_shortcode( 'csk_newsletter', 'csk_newsletter' );

function my_theme_enqueue_styles() {
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( 'parenthandle' ),
		wp_get_theme()->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}

function csk_child_theme_style() {
	
	if( is_page('media') ) {

		// this bootstrap is required for the press release and media/news post on media page
		wp_enqueue_style( 'bootstrap-min', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css", array() );

			// slick basic css for slider
		wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick/slick.css', array() );

		// slick slider css for slider
		wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri()  . '/slick/slick-theme.css', array() );

		wp_enqueue_script('slick-min', get_stylesheet_directory_uri()  . '/slick/slick.min.js', array('jquery'), [], true);
		// slick slider ain js to call the slider function

		wp_enqueue_script('slick-custom', get_stylesheet_directory_uri()  . '/slick/custom.js', array(), [], true);
	}


}

add_action( 'wp_enqueue_scripts', 'csk_child_theme_style' );
