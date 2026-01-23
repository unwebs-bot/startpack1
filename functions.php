<?php

add_action('after_setup_theme', 'starter_setup');
function starter_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menu('header-menu', 'Header Menu');
    load_theme_textdomain('starter-theme', get_template_directory() . '/languages');
}

add_action('wp_enqueue_scripts', 'starter_enqueue_assets');
function starter_enqueue_assets()
{
    // Fonts (with preconnect for performance)
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Play:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('pretendard-font', '//cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css');

    // Icons
    wp_enqueue_style('fa-style', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_style('xeicon', 'https://cdn.jsdelivr.net/gh/xpressengine/XEIcon@2.3.3/xeicon.min.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0'); // Root style.css (Metadata)
    wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.css'), array('theme-style'), '1.0'); // Real Main Styles (CPT CSS included via @import)

    // js
    wp_enqueue_script('bs-script', '//cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js', NULL, '5.1.1', true);
    wp_enqueue_script('common-script', get_theme_file_uri('/assets/js/common.js'), NULL, '1.0', true);
    wp_enqueue_script('main-script', get_theme_file_uri('/assets/js/main.js'), array('common-script'), '1.0', true);
}

/**
 * Preconnect 힌트 추가 (폰트 로딩 최적화)
 */
add_action('wp_head', 'starter_preconnect_hints', 1);
function starter_preconnect_hints()
{
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>' . "\n";
}

/**
 * ===========================================================================
 * SEO & Security Enhancements
 * ===========================================================================
 */

/**
 * robots.txt 커스터마이징
 */
add_filter('robots_txt', 'starter_robots_txt', 10, 2);
function starter_robots_txt($output, $public)
{
    if (!$public) {
        return $output;
    }

    $custom_rules = "
# Starter Theme Custom Robots.txt
User-agent: *
Allow: /

# 관리자 및 시스템 폴더 차단
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /wp-content/plugins/
Disallow: /wp-content/cache/
Disallow: /wp-content/themes/*/inc/

# 검색 결과 및 쿼리 페이지 차단
Disallow: /*?s=
Disallow: /*?p=
Disallow: /search/

# 피드 허용
Allow: /feed/$

# 크롤링 지연 (서버 부하 방지)
Crawl-delay: 1

# Sitemap (SEO 플러그인 설치 시 자동 생성)
Sitemap: " . home_url('/sitemap_index.xml') . "
Sitemap: " . home_url('/sitemap.xml') . "
";

    return $custom_rules;
}

/**
 * 보안 HTTP 헤더 추가
 */
add_action('send_headers', 'starter_security_headers');
function starter_security_headers()
{
    if (!is_admin()) {
        // XSS 보호
        header('X-XSS-Protection: 1; mode=block');
        // 콘텐츠 타입 스니핑 방지
        header('X-Content-Type-Options: nosniff');
        // 클릭재킹 방지
        header('X-Frame-Options: SAMEORIGIN');
        // Referrer 정책
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}

/**
 * WordPress 버전 정보 제거 (보안)
 */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

/**
 * 불필요한 헤더 정보 제거
 */
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * REST API 링크 제거 (선택적 보안)
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('template_redirect', 'rest_output_link_header', 11);

/**
 * Emoji 스크립트 제거 (성능 최적화)
 */
add_action('init', 'starter_disable_emojis');
function starter_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}

/**
 * ===========================================================================
 * UW Board Engine
 * ===========================================================================
 */
require_once get_template_directory() . '/inc/uw-board/class-uw-board-cpt.php';
require_once get_template_directory() . '/inc/uw-board/class-uw-board-admin.php';
require_once get_template_directory() . '/inc/uw-board/class-uw-board-engine.php';

/**
 * ===========================================================================
 * UW Inquiry Engine (입력폼 시스템)
 * ===========================================================================
 */
require_once get_template_directory() . '/inc/uw-inquiry/class-uw-inquiry-cpt.php';
require_once get_template_directory() . '/inc/uw-inquiry/class-uw-inquiry-admin.php';
require_once get_template_directory() . '/inc/uw-inquiry/class-uw-inquiry-handler.php';

/**
 * ===========================================================================
 * UW Gallery Engine (갤러리 시스템)
 * ===========================================================================
 */
require_once get_template_directory() . '/inc/uw-gallery/class-uw-gallery-cpt.php';
require_once get_template_directory() . '/inc/uw-gallery/class-uw-gallery-admin.php';
require_once get_template_directory() . '/inc/uw-gallery/class-uw-gallery-engine.php';
