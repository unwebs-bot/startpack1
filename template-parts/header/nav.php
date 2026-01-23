<?php
/**
 * Header Navigation
 */
$nav = starter_nav();
?>
<div class="uw-container">
  <h1 class="uw-logo">
    <a href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_theme_file_uri('/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
    </a>
  </h1>

  <nav class="uw-gnb">
    <ul class="uw-gnb-list">
      <?php foreach ($nav as $key => $menu): ?>
      <li class="uw-gnb-item" data-target="sub-<?php echo esc_attr($key); ?>">
        <a href="<?php echo home_url($menu['url']); ?>" class="uw-gnb-link"><?php echo esc_html($menu['label']); ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <div class="uw-util">
    <button class="uw-btn-menu" id="uwBtnMenu" aria-label="메뉴 열기">
      <div class="uw-icon-grid">
        <span></span><span></span><span></span>
        <span></span><span></span><span></span>
        <span></span><span></span><span></span>
      </div>
    </button>
  </div>
</div>

<!-- Dropdown Menu -->
<div class="uw-gnb-dropdown" id="uwDropdown">
  <div class="uw-sub-container">
    <?php foreach ($nav as $key => $menu): ?>
    <ul class="uw-sub-list" id="sub-<?php echo esc_attr($key); ?>">
      <?php foreach ($menu['items'] as $item): ?>
      <li class="uw-sub-item">
        <a href="<?php echo home_url($item['slug']); ?>"><?php echo esc_html($item['label']); ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
  </div>
</div>

<!-- Mobile Overlay Menu -->
<div class="uw-overlay-menu" id="uwOverlayMenu">
  <button class="uw-btn-close" id="uwBtnClose" aria-label="메뉴 닫기"></button>

  <div class="uw-overlay-left">
    <img src="<?php echo get_theme_file_uri('/assets/images/overlay_visual_v2.jpg'); ?>" alt="Visual">
  </div>

  <div class="uw-overlay-right">
    <ul class="uw-full-gnb">
      <?php foreach ($nav as $key => $menu): ?>
      <li class="uw-full-item">
        <a href="<?php echo home_url($menu['url']); ?>" class="uw-full-link"><?php echo esc_html($menu['label']); ?></a>
        <div class="uw-full-sub">
          <?php foreach ($menu['items'] as $item): ?>
          <a href="<?php echo home_url($item['slug']); ?>"><?php echo esc_html($item['label']); ?></a>
          <?php endforeach; ?>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
