<?php
/**
 * Mobile Navigation - Slide-in Accordion Menu
 *
 * @uses starter_nav() from inc/config.php
 */

$nav = starter_nav();
$current_section = starter_current_nav_section();
?>

<!-- Mobile Menu Button (Dot Grid - same as PC) -->
<button class="uw-mobile-btn" type="button" aria-label="메뉴 열기" aria-expanded="false" aria-controls="uwMobileMenu">
  <span class="uw-mobile-btn__dotted">
    <span class="uw-mobile-btn__dot"></span>
    <span class="uw-mobile-btn__dot"></span>
    <span class="uw-mobile-btn__dot"></span>
    <span class="uw-mobile-btn__dot"></span>
  </span>
</button>

<!-- Mobile Menu Overlay -->
<div class="uw-mobile-overlay" aria-hidden="true"></div>

<!-- Mobile Navigation Panel -->
<nav class="uw-mobile-nav" id="uwMobileMenu" aria-label="모바일 메뉴" aria-hidden="true">

  <!-- Mobile Nav Header -->
  <div class="uw-mobile-nav__header">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="uw-mobile-nav__logo">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/logo.png')); ?>" alt="<?php bloginfo('name'); ?>">
    </a>
  </div>

  <!-- Mobile Nav Content -->
  <div class="uw-mobile-nav__content">
    <ul class="uw-mobile-nav__list">
      <?php foreach ($nav as $key => $menu) : ?>
      <li class="uw-mobile-nav__item<?php echo ($key === $current_section) ? ' is-active' : ''; ?>" data-menu="<?php echo esc_attr($key); ?>">

        <?php if (!empty($menu['items'])) : ?>
        <!-- Accordion Header (with submenu) -->
        <button class="uw-mobile-nav__trigger" type="button" aria-expanded="false">
          <span class="uw-mobile-nav__title"><?php echo esc_html($menu['label']); ?></span>
          <!-- SVG Toggle Icon -->
          <span class="uw-mobile-nav__icon">
            <svg class="uw-icon uw-icon--plus" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="12" y1="5" x2="12" y2="19"></line>
              <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <svg class="uw-icon uw-icon--minus" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
          </span>
        </button>

        <!-- Accordion Content -->
        <div class="uw-mobile-nav__panel" aria-hidden="true">
          <ul class="uw-mobile-nav__sub-list">
            <?php foreach ($menu['items'] as $item) : ?>
            <li>
              <a href="<?php echo esc_url(home_url($item['slug'])); ?>" class="uw-mobile-nav__sub-link">
                <?php echo esc_html($item['label']); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <?php else : ?>
        <!-- Direct Link (no submenu) -->
        <a href="<?php echo esc_url(home_url($menu['url'])); ?>" class="uw-mobile-nav__link">
          <span class="uw-mobile-nav__title"><?php echo esc_html($menu['label']); ?></span>
        </a>
        <?php endif; ?>

      </li>
      <?php endforeach; ?>
    </ul>
  </div>

</nav>
