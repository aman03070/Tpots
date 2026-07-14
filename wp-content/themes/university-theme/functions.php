<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Pull in our core backend logic
require_once get_template_directory() . '/inc/core-functions.php';

function univ_theme_setup() {
    // Native Theme Supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    
    // Register Menus required for the dynamic Header/Footer
    register_nav_menus([
        'primary-menu' => esc_html__( 'Primary Menu', 'university-theme' ),
        'footer-menu'  => esc_html__( 'Footer Menu', 'university-theme' ),
    ]);
}
add_action( 'after_setup_theme', 'univ_theme_setup' );

function univ_enqueue_scripts() {
    // Enqueue Google Font (Inter)
    wp_enqueue_style( 'univ-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', [], null );
    
    // Main Stylesheet
    wp_enqueue_style( 'univ-main-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.0' );
    
    // Main JS (for the Modal)
    wp_enqueue_script( 'univ-main-js', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'univ_enqueue_scripts' );