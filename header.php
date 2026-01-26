<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Navigation -->
<a href="#main-content" class="skip-link">본문 바로가기</a>

<!-- Header -->
<header class="uw-header" id="uwHeader" role="banner">
  <?php get_template_part('template-parts/header/nav'); ?>
</header>

<!-- Mobile Navigation (Slide-in Accordion) -->
<?php get_template_part('template-parts/header/nav-mobile'); ?>
