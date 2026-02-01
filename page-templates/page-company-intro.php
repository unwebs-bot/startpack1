<?php
/**
 * Template Name: 기업 소개
 * Description: 회사소개 > 기업 소개 페이지 템플릿
 */
get_header();
?>

<?php get_template_part('template-parts/common/sub-visual'); ?>

<main class="uw-main" id="main-content" role="main">

  <!-- 섹션 1: 회사 개요 -->
  <section class="section">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">회사 개요</h4>
        <p class="sub-tit">혁신적인 기술로 더 나은 미래를 만들어갑니다</p>
      </div>
      <div class="grid grid--2 grid--gap-lg grid--align-center mt-60">
        <div class="img-placeholder img-placeholder--lg"></div>
        <div>
          <p class="text-desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            <br><br>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션 2: 연혁 (배경색) -->
  <section class="section section--gray">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">회사 연혁</h4>
        <p class="sub-tit">끊임없는 성장의 발자취</p>
      </div>
      <div class="history-list">
        <div class="history-item">
          <span class="history-year">2024</span>
          <div class="history-content">
            <p>신규 연구소 설립</p>
            <p>ISO 9001 인증 획득</p>
          </div>
        </div>
        <div class="history-item">
          <span class="history-year">2020</span>
          <div class="history-content">
            <p>법인 설립</p>
            <p>첫 번째 제품 출시</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션 3: 인증/수상 -->
  <section class="section">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">인증 및 수상</h4>
        <p class="sub-tit">신뢰할 수 있는 기술력을 인정받았습니다</p>
      </div>
      <div class="grid grid--4 mt-60">
        <div class="cert-card">인증서 1</div>
        <div class="cert-card">인증서 2</div>
        <div class="cert-card">인증서 3</div>
        <div class="cert-card">인증서 4</div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
