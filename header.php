<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">
  <meta property="og:image" content="<?php echo esc_url(get_theme_file_uri('/assets/images/og-image.jpg')); ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="uw-header" id="uwHeader">
  <?php get_template_part('template-parts/header/nav'); ?>
</header>
