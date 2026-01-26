<?php
/**
 * Template Part: Sub-Visual (서브페이지 비주얼)
 *
 * 사용법:
 * get_template_part('template-parts/common/sub-visual');
 *
 * 또는 타이틀 커스텀:
 * set_query_var('sub_visual_title', '커스텀 타이틀');
 * get_template_part('template-parts/common/sub-visual');
 */

// 현재 섹션 정보
$current_section = starter_current_nav_section();
$nav_data = starter_nav($current_section);
$section_label = $nav_data['label'] ?? '';
$lnb_items = $nav_data['items'] ?? array();

// 현재 페이지 정보
$current_uri = isset($_SERVER['REQUEST_URI'])
    ? esc_url_raw(wp_unslash($_SERVER['REQUEST_URI']))
    : '';
$current_uri_clean = trim(parse_url($current_uri, PHP_URL_PATH), '/');

// 현재 서브메뉴 라벨 찾기
$current_page_label = '';
foreach ($lnb_items as $item) {
    if (trim($item['slug'], '/') === $current_uri_clean) {
        $current_page_label = $item['label'];
        break;
    }
}

// 타이틀 (커스텀 또는 현재 페이지 라벨)
$title = get_query_var('sub_visual_title', '');
if (empty($title)) {
    $title = !empty($current_page_label) ? $current_page_label : get_the_title();
}
?>

<section class="sub-visual">
  <div class="sub-visual-bg"></div>

  <div class="sub-visual-content">
    <!-- 브레드크럼 -->
    <nav class="sub-breadcrumb" aria-label="현재 위치">
      <ul class="sub-breadcrumb__list">
        <li class="sub-breadcrumb__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" title="홈으로">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
              <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
          </a>
        </li>
        <?php if (!empty($section_label)) : ?>
        <li class="sub-breadcrumb__item"><?php echo esc_html($section_label); ?></li>
        <?php endif; ?>
        <?php if (!empty($current_page_label)) : ?>
        <li class="sub-breadcrumb__item is-current"><?php echo esc_html($current_page_label); ?></li>
        <?php endif; ?>
      </ul>
    </nav>

    <!-- 페이지 타이틀 -->
    <h2 class="sub-visual__title"><?php echo esc_html($title); ?></h2>
  </div>

  <!-- 서브 LNB (서브메뉴가 2개 이상일 때만 표시) -->
  <?php if (count($lnb_items) > 1) : ?>
  <nav class="sub-lnb" aria-label="섹션 내 메뉴">
    <ul class="sub-lnb__list">
      <?php foreach ($lnb_items as $item) :
        $item_slug_clean = trim($item['slug'], '/');
        $is_active = ($current_uri_clean === $item_slug_clean) ? ' is-active' : '';
      ?>
      <li class="sub-lnb__item<?php echo esc_attr($is_active); ?>">
        <a href="<?php echo esc_url(home_url($item['slug'])); ?>">
          <?php echo esc_html($item['label']); ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <?php endif; ?>
</section>
