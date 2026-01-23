<?php
/**
 * Template Part: Sub-Visual (Hero Section with LNB)
 */
$current_section = starter_current_nav_section();
$nav_data = starter_nav($current_section);
$lnb_items = $nav_data['items'] ?? array();
$current_uri = $_SERVER['REQUEST_URI'];
?>

<section class="sub-visual <?php echo esc_attr($current_section); ?>">
  <div class="sub-visual-bg"></div>
  <div class="sub-visual-content">
    <h1 class="sub-page-title"><?php echo esc_html(get_the_title()); ?></h1>
  </div>

  <?php if (count($lnb_items) > 1): ?>
  <div class="sub-lnb">
    <div class="uw-container">
      <ul class="sub-lnb-list">
        <?php foreach ($lnb_items as $item):
          $is_active = (trim($current_uri, '/') === trim($item['slug'], '/')) ? 'active' : '';
        ?>
        <li class="sub-lnb-item <?php echo esc_attr($is_active); ?>">
          <a href="<?php echo esc_url(home_url($item['slug'])); ?>">
            <?php echo esc_html($item['label']); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
</section>
