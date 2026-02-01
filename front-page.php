<?php
/**
 * Front Page Template
 */
get_header();
?>

<main class="uw-main" id="main-content" role="main">

  <!-- 메인 비주얼 슬라이더 -->
  <section class="uw-visual">
    <div class="uw-visual__slide is-active">
      <div class="uw-visual__bg" style="background-image: url('<?php echo esc_url(get_theme_file_uri('/assets/images/bg1.jpg')); ?>');"></div>
      <div class="uw-visual__overlay"></div>
      <div class="uw-visual__content">
        <h2 class="uw-visual__title">Strategic<br>Planning</h2>
        <p class="uw-visual__desc">데이터 기반의 확실한 전략으로<br>비즈니스의 성장을 견인합니다.</p>
      </div>
    </div>

    <div class="uw-visual__slide">
      <div class="uw-visual__bg" style="background-image: url('<?php echo esc_url(get_theme_file_uri('/assets/images/bg2.jpg')); ?>');"></div>
      <div class="uw-visual__overlay"></div>
      <div class="uw-visual__content">
        <h2 class="uw-visual__title">Creative<br>Design</h2>
        <p class="uw-visual__desc">직관적이고 구조적인 디자인으로<br>사용자 경험을 최적화합니다.</p>
      </div>
    </div>

    <div class="uw-visual__slide">
      <div class="uw-visual__bg" style="background-image: url('<?php echo esc_url(get_theme_file_uri('/assets/images/bg3.jpg')); ?>');"></div>
      <div class="uw-visual__overlay"></div>
      <div class="uw-visual__content">
        <h2 class="uw-visual__title">System<br>Optimization</h2>
        <p class="uw-visual__desc">효율적인 유지보수 시스템 구축으로<br>운영 리소스를 최소화합니다.</p>
      </div>
    </div>

    <div class="uw-visual__nav">
      <div class="uw-visual__nav-item is-active" data-slide="0"><div class="uw-visual__nav-fill"></div></div>
      <div class="uw-visual__nav-item" data-slide="1"><div class="uw-visual__nav-fill"></div></div>
      <div class="uw-visual__nav-item" data-slide="2"><div class="uw-visual__nav-fill"></div></div>
    </div>

    <div class="uw-visual__scroll">
      <span class="uw-visual__scroll-text">Scroll Down</span>
      <div class="uw-visual__scroll-line"></div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
