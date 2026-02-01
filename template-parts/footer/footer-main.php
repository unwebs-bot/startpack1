<?php
/**
 * Footer Main Template
 *
 * @uses starter_footer_data() from inc/config.php
 */

$footer_data = starter_footer_data();
$company_info = $footer_data['companyInfo'];
$social_links = array_filter($footer_data['socialLinks'], function ($link) {
    return !empty($link['url']);
});
?>

<footer class="uw-footer" role="contentinfo">
  <div class="uw-footer__inner">

    <!-- Upper Section: Logo & Social Links -->
    <div class="uw-footer__upper">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="uw-footer__logo">
        <img src="<?php echo esc_url($footer_data['logo']); ?>" alt="<?php bloginfo('name'); ?>">
      </a>

      <?php if (!empty($social_links)) : ?>
      <div class="uw-footer__social">
        <?php foreach ($social_links as $social) : ?>
        <a href="<?php echo esc_url($social['url']); ?>" class="uw-footer__social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($social['name']); ?>">
          <?php echo starter_get_social_icon($social['icon']); ?>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>

    <!-- Middle Section: Contact Info -->
    <div class="uw-footer__middle">
      <div class="uw-footer__contact">
        <!-- Row 1: Address -->
        <?php if (!empty($company_info['address'])) : ?>
        <div class="uw-footer__contact-row--address">
          <div class="uw-footer__contact-item">
            <span class="uw-footer__contact-label">주소</span>
            <span class="uw-footer__contact-value"><?php echo esc_html($company_info['address']); ?></span>
          </div>
        </div>
        <?php endif; ?>

        <!-- Row 2: Tel, Fax, Email -->
        <div class="uw-footer__contact-row--details">
          <?php if (!empty($company_info['tel'])) : ?>
          <div class="uw-footer__contact-item">
            <span class="uw-footer__contact-label">Tel</span>
            <span class="uw-footer__contact-value"><?php echo esc_html($company_info['tel']); ?></span>
          </div>
          <?php endif; ?>

          <?php if (!empty($company_info['fax'])) : ?>
          <div class="uw-footer__contact-item">
            <span class="uw-footer__contact-label">Fax</span>
            <span class="uw-footer__contact-value"><?php echo esc_html($company_info['fax']); ?></span>
          </div>
          <?php endif; ?>

          <?php if (!empty($company_info['email'])) : ?>
          <div class="uw-footer__contact-item">
            <span class="uw-footer__contact-label">Email</span>
            <span class="uw-footer__contact-value"><?php echo esc_html($company_info['email']); ?></span>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Bottom Section: Copyright & Legal -->
    <div class="uw-footer__bottom">
      <p class="uw-footer__copyright"><?php echo esc_html($company_info['copyright']); ?></p>

      <div class="uw-footer__legal">
        <button type="button" class="uw-footer__legal-link" data-modal="privacy">개인정보처리방침</button>
        <button type="button" class="uw-footer__legal-link" data-modal="terms">이용약관</button>
      </div>
    </div>

  </div>
</footer>
