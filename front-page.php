<?php
/**
 * Front Page Template
 */
get_header();
$company = starter_company();
?>

<main class="uw-main">

  <!-- Hero Visual -->
  <section class="uw-visual">
    <ul class="uw-visual-list">
      <li class="uw-visual-item is-active">
        <div class="uw-visual-bg" style="background-image: url('<?php echo get_theme_file_uri('/assets/images/main_visual_01.png'); ?>')"></div>
        <div class="uw-visual-content">
          <div class="uw-visual-text-wrap">
            <div class="uw-visual-pagination" role="tablist">
              <button class="uw-visual-page is-active" data-index="0">01</button>
              <button class="uw-visual-page" data-index="1">02</button>
            </div>
            <h2 class="uw-visual-title">Welcome to Our Company</h2>
            <p class="uw-visual-desc">최고의 품질과 서비스로 고객 만족을 실현합니다.</p>
          </div>
        </div>
      </li>
      <li class="uw-visual-item">
        <div class="uw-visual-bg" style="background-image: url('<?php echo get_theme_file_uri('/assets/images/hero_slide_02.jpg'); ?>')"></div>
        <div class="uw-visual-content">
          <div class="uw-visual-text-wrap">
            <div class="uw-visual-pagination" role="tablist">
              <button class="uw-visual-page" data-index="0">01</button>
              <button class="uw-visual-page is-active" data-index="1">02</button>
            </div>
            <h2 class="uw-visual-title">Innovation & Excellence</h2>
            <p class="uw-visual-desc">혁신적인 기술력으로 미래를 선도합니다.</p>
          </div>
        </div>
      </li>
    </ul>
  </section>

  <!-- Business Section -->
  <section class="uw-business">
    <div class="uw-section-common-header">
      <span class="uw-sub-title" data-animate="fade-up">Business</span>
      <h2 class="uw-title delay-200" data-animate="fade-up">주요 사업 안내</h2>
    </div>
    <div class="uw-container">
      <ul class="uw-business-list">
        <li class="uw-business-item delay-200" data-animate="fade-up">
          <a href="<?php echo site_url('/business/'); ?>" class="uw-business-link">
            <div class="uw-business-bg" style="background-image: url('<?php echo get_theme_file_uri('/assets/images/business_01.png'); ?>')"></div>
            <div class="uw-business-content">
              <div class="uw-business-text-wrapper">
                <span class="uw-business-num">01</span>
                <h3 class="uw-business-name">사업영역 1</h3>
                <div class="uw-business-hover">
                  <p class="uw-business-desc">사업 영역에 대한 설명을 입력하세요.</p>
                  <span class="uw-business-arrow"></span>
                </div>
              </div>
            </div>
          </a>
        </li>
        <li class="uw-business-item delay-400" data-animate="fade-up">
          <a href="<?php echo site_url('/business/'); ?>" class="uw-business-link">
            <div class="uw-business-bg" style="background-image: url('<?php echo get_theme_file_uri('/assets/images/business_02.png'); ?>')"></div>
            <div class="uw-business-content">
              <div class="uw-business-text-wrapper">
                <span class="uw-business-num">02</span>
                <h3 class="uw-business-name">사업영역 2</h3>
                <div class="uw-business-hover">
                  <p class="uw-business-desc">사업 영역에 대한 설명을 입력하세요.</p>
                  <span class="uw-business-arrow"></span>
                </div>
              </div>
            </div>
          </a>
        </li>
        <li class="uw-business-item delay-600" data-animate="fade-up">
          <a href="<?php echo site_url('/business/'); ?>" class="uw-business-link">
            <div class="uw-business-bg" style="background-image: url('<?php echo get_theme_file_uri('/assets/images/business_03.png'); ?>')"></div>
            <div class="uw-business-content">
              <div class="uw-business-text-wrapper">
                <span class="uw-business-num">03</span>
                <h3 class="uw-business-name">사업영역 3</h3>
                <div class="uw-business-hover">
                  <p class="uw-business-desc">사업 영역에 대한 설명을 입력하세요.</p>
                  <span class="uw-business-arrow"></span>
                </div>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <!-- About Section -->
  <section class="uw-about" id="about">
    <div class="uw-about-container">
      <div class="uw-about-image">
        <div class="uw-about-image-wrapper" data-animate="reveal">
          <img src="<?php echo get_theme_file_uri('/assets/images/company_building.png'); ?>" alt="<?php echo esc_attr($company['name']); ?>" loading="lazy">
        </div>
      </div>
      <div class="uw-about-content">
        <span class="uw-about-label">About Us</span>
        <h2 class="uw-about-main-title" data-animate="fade-up">Global Leaders<br>in Our Industry</h2>
        <p class="uw-about-description" data-animate="fade-up">고객과 함께 성장하는 기업이 되겠습니다.</p>
      </div>
    </div>
  </section>

  <!-- Community Section -->
  <section class="uw-community">
    <div class="uw-section-common-header">
      <span class="uw-sub-title" data-animate="fade-up">Community</span>
      <h2 class="uw-title delay-200" data-animate="fade-up">커뮤니티</h2>
    </div>
    <div class="uw-container">
      <?php echo do_shortcode('[latest_posts id="notice" url="/support/notice/" limit="3"]'); ?>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="uw-contact" id="contact">
    <div class="uw-container">
      <div class="uw-contact-left">
        <h2 class="uw-contact-slogan" data-animate="fade-up">
          고객의 성공이<br>
          <span>우리의 성공입니다.</span>
        </h2>
      </div>
      <div class="uw-contact-right">
        <a href="<?php echo site_url('/support/notice/'); ?>" class="uw-contact-card delay-200" data-animate="fade-up">
          <span class="uw-contact-card-icon notice"></span>
          <span class="uw-contact-card-title">공지사항</span>
          <span class="uw-contact-card-desc">새로운 소식과 공지사항을 확인하세요.</span>
          <span class="uw-contact-card-link">More view</span>
        </a>
        <a href="<?php echo site_url('/contact/'); ?>" class="uw-contact-card delay-400" data-animate="fade-up">
          <span class="uw-contact-card-icon inquiry"></span>
          <span class="uw-contact-card-title">온라인 문의</span>
          <span class="uw-contact-card-desc">궁금한 사항을 문의해 주세요.</span>
          <div class="uw-contact-info">
            <span class="uw-contact-email"><?php echo esc_html($company['email']); ?></span>
            <span class="uw-contact-tel"><?php echo esc_html($company['tel']); ?></span>
          </div>
        </a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
