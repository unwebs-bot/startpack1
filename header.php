<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="{{META_DESCRIPTION}}">
  <meta name="keywords" content="{{META_KEYWORDS}}">
  <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta property="og:description" content="{{OG_DESCRIPTION}}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">
  <meta property="og:image" content="<?php echo esc_url(get_theme_file_uri('/assets/images/og-image.jpg')); ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:locale" content="ko_KR">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta name="twitter:description" content="{{OG_DESCRIPTION}}">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">

  <!-- Schema.org 구조화 데이터 -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{COMPANY_NAME}}",
    "alternateName": "{{COMPANY_NAME_ALT}}",
    "url": "<?php echo esc_url(home_url('/')); ?>",
    "logo": "<?php echo esc_url(get_theme_file_uri('/assets/images/logo.png')); ?>",
    "description": "{{META_DESCRIPTION}}",
    "address": {
      "@type": "PostalAddress",
      "addressCountry": "KR"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "{{PHONE}}",
      "contactType": "customer service",
      "availableLanguage": ["Korean", "English"]
    },
    "sameAs": []
  }
  </script>
  <?php if (is_front_page()) : ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "<?php bloginfo('name'); ?>",
    "url": "<?php echo esc_url(home_url('/')); ?>",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "<?php echo esc_url(home_url('/')); ?>?s={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
  </script>
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- 헤더 영역 -->
  <header class="uw-header" id="uwHeader">
    <?php
    get_template_part('template-parts/header/uw-container');
    get_template_part('template-parts/header/uw-dropdown');
    get_template_part('template-parts/header/uw-overlay');
    ?>

  </header>
  <!-- 헤더 끝 -->
