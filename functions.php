<?php
/**
 * Thread & Form — Theme setup and asset pipeline.
 * Presentation layer only. Commerce and persistent data belong to plugins.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Theme setup: text domain, editor styles, block supports.
 */
function tf_theme_setup() {
    load_theme_textdomain( 'thread-and-form', get_template_directory() . '/languages' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_editor_style( array(
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap',
        'assets/css/theme.css'
    ) );
}
add_action( 'after_setup_theme', 'tf_theme_setup' );

/**
 * Preconnect to Google Fonts for lightning-fast typography rendering.
 */
function tf_resource_hints( $urls, $relation_type ) {
    if ( wp_dependencies_unique_hosts() && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'tf_resource_hints', 10, 2 );

/**
 * Enqueue frontend fonts, stylesheets, and interactive animation scripts.
 */
function tf_theme_assets() {
    // Google Fonts: Editorial Serif (Playfair Display) + Contemporary Sans (Plus Jakarta Sans)
    wp_enqueue_style(
        'tf-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Main Theme Stylesheet
    $css_path = get_theme_file_path( 'assets/css/theme.css' );
    $css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : '1.1.0';
    wp_enqueue_style( 'tf-theme', get_theme_file_uri( 'assets/css/theme.css' ), array( 'tf-fonts' ), $css_ver );

    // Tailwind CSS Architecture Stylesheet
    $tw_path = get_theme_file_path( 'assets/css/tailwind.css' );
    if ( file_exists( $tw_path ) ) {
        $tw_ver = filemtime( $tw_path );
        wp_enqueue_style( 'tf-tailwind', get_theme_file_uri( 'assets/css/tailwind.css' ), array( 'tf-theme' ), $tw_ver );
    }

    // Interactive Theme Animations and Interactions Script
    $js_path = get_theme_file_path( 'assets/js/theme.js' );
    $js_ver  = file_exists( $js_path ) ? filemtime( $js_path ) : '1.1.0';
    wp_enqueue_script( 'tf-theme-script', get_theme_file_uri( 'assets/js/theme.js' ), array(), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'tf_theme_assets' );

/**
 * Register custom block pattern categories.
 */
function tf_pattern_category() {
    register_block_pattern_category(
        'thread-and-form',
        array( 'label' => __( 'Thread & Form', 'thread-and-form' ) )
    );
}
add_action( 'init', 'tf_pattern_category' );

require_once get_template_directory() . '/inc-setup.php';
require_once get_template_directory() . '/inc-seo.php';
