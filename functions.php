<?php
/**
 * Starter Theme Functions
 */

// Load config
require_once get_template_directory() . '/inc/config.php';

/**
 * Theme Setup
 */
add_action('after_setup_theme', 'starter_setup');
function starter_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'gallery', 'caption'));
    register_nav_menu('header-menu', 'Header Menu');
}

/**
 * Enqueue Assets
 */
add_action('wp_enqueue_scripts', 'starter_enqueue_assets');
function starter_enqueue_assets()
{
    // Google Fonts (Poppins)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap', array(), null);

    // Theme CSS
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.css'), array('google-fonts', 'theme-style'), '1.0');

    // JS
    wp_enqueue_script('header', get_theme_file_uri('/assets/js/header.js'), array(), '1.0', true);
    wp_enqueue_script('footer', get_theme_file_uri('/assets/js/footer.js'), array(), '1.0', true);
    wp_enqueue_script('main', get_theme_file_uri('/assets/js/main.js'), array('header', 'footer'), '1.0', true);
}

/**
 * Security Headers
 */
add_action('send_headers', 'starter_security_headers');
function starter_security_headers()
{
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}

/**
 * Cleanup WP Head
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('the_generator', '__return_empty_string');

/**
 * CPT Engines
 */
require_once get_template_directory() . '/inc/uw-board/class-uw-board-cpt.php';
require_once get_template_directory() . '/inc/uw-board/class-uw-board-admin.php';
require_once get_template_directory() . '/inc/uw-board/class-uw-board-engine.php';

require_once get_template_directory() . '/inc/uw-inquiry/class-uw-inquiry-cpt.php';
require_once get_template_directory() . '/inc/uw-inquiry/class-uw-inquiry-admin.php';
require_once get_template_directory() . '/inc/uw-inquiry/class-uw-inquiry-handler.php';

require_once get_template_directory() . '/inc/uw-gallery/class-uw-gallery-cpt.php';
require_once get_template_directory() . '/inc/uw-gallery/class-uw-gallery-admin.php';
require_once get_template_directory() . '/inc/uw-gallery/class-uw-gallery-engine.php';
