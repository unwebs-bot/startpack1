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
    load_theme_textdomain('starter-theme', get_template_directory() . '/languages');
}

/**
 * Enqueue Assets
 */
add_action('wp_enqueue_scripts', 'starter_enqueue_assets');
function starter_enqueue_assets()
{
    // Fonts
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('pretendard', '//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css');

    // Icons
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_style('xeicon', '//cdn.jsdelivr.net/gh/xpressengine/XEIcon@2.3.3/xeicon.min.css');

    // Theme CSS
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.css'), array('theme-style'), '1.0');

    // JS
    wp_enqueue_script('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js', array(), '5.1.1', true);
    wp_enqueue_script('common', get_theme_file_uri('/assets/js/common.js'), array(), '1.0', true);
    wp_enqueue_script('main', get_theme_file_uri('/assets/js/main.js'), array('common'), '1.0', true);
}

/**
 * Preconnect Hints
 */
add_action('wp_head', 'starter_preconnect', 1);
function starter_preconnect()
{
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>' . "\n";
}

/**
 * Security Headers
 */
add_action('send_headers', 'starter_security_headers');
function starter_security_headers()
{
    if (!is_admin()) {
        header('X-XSS-Protection: 1; mode=block');
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
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('template_redirect', 'rest_output_link_header', 11);
add_filter('the_generator', '__return_empty_string');

/**
 * Custom Robots.txt
 */
add_filter('robots_txt', 'starter_robots_txt', 10, 2);
function starter_robots_txt($output, $public)
{
    if (!$public) return $output;

    return "User-agent: *
Allow: /
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /*?s=
Disallow: /*?p=
Crawl-delay: 1
Sitemap: " . home_url('/sitemap.xml');
}

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
