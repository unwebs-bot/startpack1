<?php
/**
 * Header Navigation
 *
 * @uses starter_nav() from inc/config.php
 */

$nav = starter_nav();
$current_section = starter_current_nav_section();
?>

<div class="uw-header__wrap">
  <div class="uw-header__inner">

    <!-- Logo -->
    <h1 class="uw-header__logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/logo.png')); ?>" alt="<?php bloginfo('name'); ?>">
      </a>
    </h1>

    <!-- GNB (PC Navigation) -->
    <nav class="uw-gnb" aria-label="메인 메뉴">
      <ul class="uw-gnb__list">
        <?php foreach ($nav as $key => $menu) : ?>
        <li class="uw-gnb__item<?php echo ($key === $current_section) ? ' is-active' : ''; ?>">
          <a href="<?php echo esc_url(home_url($menu['url'])); ?>" class="uw-gnb__link">
            <?php echo esc_html($menu['label']); ?>
          </a>
          <?php if (!empty($menu['items'])) : ?>
          <div class="uw-gnb__sub">
            <ul class="uw-gnb__sub-list">
              <?php foreach ($menu['items'] as $item) : ?>
              <li class="uw-gnb__sub-item">
                <a href="<?php echo esc_url(home_url($item['slug'])); ?>" class="uw-gnb__sub-link">
                  <?php echo esc_html($item['label']); ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <!-- Utility Box (Sitemap Button) -->
    <div class="uw-header__util">
      <button class="uw-header__sitemap-btn" type="button" aria-label="사이트맵 열기" aria-expanded="false">
        <span class="uw-header__dotted">
          <span class="uw-header__dot"></span>
          <span class="uw-header__dot"></span>
          <span class="uw-header__dot"></span>
          <span class="uw-header__dot"></span>
        </span>
      </button>
    </div>

  </div>
</div>

<!-- Sitemap Overlay (PC Fullscreen Menu) -->
<div class="uw-sitemap" aria-hidden="true">
  <div class="uw-sitemap__bg"></div>
  <ul class="uw-sitemap__container">
    <?php foreach ($nav as $key => $menu) : ?>
    <li class="uw-sitemap__col" data-menu="<?php echo esc_attr($key); ?>">
      <h4 class="uw-sitemap__title"><?php echo esc_html($menu['label']); ?></h4>
      <?php if (!empty($menu['items'])) : ?>
      <ul class="uw-sitemap__list">
        <?php foreach ($menu['items'] as $item) : ?>
        <li>
          <a href="<?php echo esc_url(home_url($item['slug'])); ?>" class="uw-sitemap__link">
            <?php echo esc_html($item['label']); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
