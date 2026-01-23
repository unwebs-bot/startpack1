<?php $company = starter_company(); ?>

<footer class="uw-footer">
  <div class="uw-container">
    <div class="uw-footer-middle">
      <a href="<?php echo home_url('/'); ?>" class="uw-footer-logo">
        <img src="<?php echo get_theme_file_uri('/assets/images/logo.png'); ?>" alt="Logo">
      </a>
      <div class="uw-footer-contact">
        <?php if ($company['tel']): ?>
        <span class="uw-footer-phone"><?php echo esc_html($company['tel']); ?></span>
        <?php endif; ?>
        <?php if ($company['fax']): ?>
        <div class="uw-footer-contact-detail">
          <span class="uw-footer-contact-label">Fax.</span>
          <span><?php echo esc_html($company['fax']); ?></span>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="uw-footer-info">
      <div class="uw-footer-info-row">
        <?php if ($company['ceo']): ?>
        <span><?php echo esc_html($company['ceo']); ?></span>
        <?php endif; ?>
        <?php if ($company['name']): ?>
        <span><?php echo esc_html($company['name']); ?></span>
        <?php endif; ?>
      </div>
      <div class="uw-footer-info-row">
        <?php if ($company['address']): ?>
        <span><?php echo esc_html($company['address']); ?></span>
        <?php endif; ?>
        <?php if ($company['biz_no']): ?>
        <span><?php echo esc_html($company['biz_no']); ?></span>
        <?php endif; ?>
      </div>
    </div>

    <div class="uw-footer-bottom">
      <p class="uw-footer-copyright">&copy; <?php echo date('Y'); ?> <?php echo esc_html($company['name']); ?>. ALL RIGHTS RESERVED.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
