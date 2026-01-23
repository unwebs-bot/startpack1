<?php
/**
 * Site Configuration
 *
 * 프로젝트 시작 시 아래 값들을 실제 정보로 교체하세요.
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

/**
 * Get site config
 */
function starter_get_config()
{
    static $config = null;

    if ($config === null) {
        $config = array(
            // Company Info
            'company' => array(
                'name'      => '회사명',
                'name_en'   => 'Company Name',
                'ceo'       => '대표자명',
                'tel'       => '02-0000-0000',
                'fax'       => '02-0000-0001',
                'email'     => 'info@example.com',
                'address'   => '서울특별시 강남구 테헤란로 123',
                'biz_no'    => '000-00-00000',
                'corp_no'   => '0000-0000-0000',
            ),

            // SNS Links
            'sns' => array(
                'facebook'  => '',
                'instagram' => '',
                'youtube'   => '',
                'blog'      => '',
            ),

            // Navigation Menu
            'nav' => array(
                'about' => array(
                    'label' => 'About Us',
                    'url'   => '/about/ceo/',
                    'items' => array(
                        array('slug' => '/about/ceo/', 'label' => 'CEO 인사말'),
                        array('slug' => '/about/history/', 'label' => '연혁'),
                        array('slug' => '/about/vision/', 'label' => '비전'),
                        array('slug' => '/about/location/', 'label' => '오시는길'),
                    ),
                ),
                'business' => array(
                    'label' => 'Business',
                    'url'   => '/business/tech/',
                    'items' => array(
                        array('slug' => '/business/tech/', 'label' => '핵심기술'),
                        array('slug' => '/business/areas/', 'label' => '사업분야'),
                        array('slug' => '/business/cert/', 'label' => '특허&인증'),
                    ),
                ),
                'product' => array(
                    'label' => 'Product',
                    'url'   => '/product/',
                    'items' => array(
                        array('slug' => '/product/', 'label' => '제품소개'),
                    ),
                ),
                'support' => array(
                    'label' => 'Support',
                    'url'   => '/support/notice/',
                    'items' => array(
                        array('slug' => '/support/notice/', 'label' => '공지사항'),
                        array('slug' => '/support/news/', 'label' => '뉴스'),
                    ),
                ),
                'contact' => array(
                    'label' => 'Contact',
                    'url'   => '/contact/',
                    'items' => array(
                        array('slug' => '/contact/', 'label' => '상담 문의'),
                    ),
                ),
            ),
        );
    }

    return $config;
}

/**
 * Get company info
 */
function starter_company($key = null)
{
    $config = starter_get_config();
    if ($key === null) {
        return $config['company'];
    }
    return isset($config['company'][$key]) ? $config['company'][$key] : '';
}

/**
 * Get navigation menu
 */
function starter_nav($section = null)
{
    $config = starter_get_config();
    if ($section === null) {
        return $config['nav'];
    }
    return isset($config['nav'][$section]) ? $config['nav'][$section] : array();
}

/**
 * Get current nav section from URL
 */
function starter_current_nav_section()
{
    // 보안: REQUEST_URI 살균 (XSS 방지)
    $uri = isset($_SERVER['REQUEST_URI'])
        ? esc_url_raw(wp_unslash($_SERVER['REQUEST_URI']))
        : '';
    $nav = starter_nav();

    foreach ($nav as $key => $data) {
        // $key는 내부 정의값이므로 안전
        if (strpos($uri, '/' . $key . '/') !== false) {
            return $key;
        }
    }

    return 'about'; // default
}

/**
 * Get SNS links
 */
function starter_sns($key = null)
{
    $config = starter_get_config();
    if ($key === null) {
        return array_filter($config['sns']); // 빈 값 제거
    }
    return isset($config['sns'][$key]) ? $config['sns'][$key] : '';
}
