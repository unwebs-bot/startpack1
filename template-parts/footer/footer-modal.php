<?php
/**
 * Footer Modal Template
 *
 * Legal content modal for Privacy Policy and Terms of Service
 *
 * @uses starter_privacy_policy() from inc/config.php
 * @uses starter_terms_of_service() from inc/config.php
 */
?>

<!-- Legal Content Modal -->
<div class="uw-modal-overlay" aria-hidden="true">
  <div class="uw-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="uw-modal__header">
      <h2 class="uw-modal__title" id="modalTitle"></h2>
      <button type="button" class="uw-modal__close" aria-label="닫기">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    <div class="uw-modal__body">
      <div class="uw-modal__content"></div>
    </div>
  </div>
</div>

<!-- Hidden Legal Content Templates -->
<template id="privacyContent">
  <?php echo starter_privacy_policy(); ?>
</template>

<template id="termsContent">
  <?php echo starter_terms_of_service(); ?>
</template>
