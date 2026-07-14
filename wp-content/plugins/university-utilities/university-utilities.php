<?php
/**
 * Plugin Name: University Utilities
 * Description: Registers custom utilities for the University Website assessment.
 * Version: 1.0.0
 * Author: Aman
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function uu_university_year_shortcode() {
    return '&copy; ' . date('Y') . ' University of Aberdeen';
}
add_shortcode( 'university_year', 'uu_university_year_shortcode' );