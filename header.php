<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#1d8795">
  <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url(esc_url_raw(wp_unslash($_SERVER['REQUEST_URI'] ?? '/')))); ?>">
  <meta property="og:image" content="<?php echo esc_url(get_theme_file_uri('/assets/images/og-image.jpg')); ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Navigation (웹 접근성) -->
<a href="#main-content" class="skip-link">본문 바로가기</a>

<header class="uw-header" id="uwHeader" role="banner">
  <?php get_template_part('template-parts/header/nav'); ?>
</header>
