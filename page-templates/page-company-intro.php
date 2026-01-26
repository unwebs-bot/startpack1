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
  <section class="section" style="padding: 100px 0;">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">회사 개요</h4>
        <p class="sub-tit">혁신적인 기술로 더 나은 미래를 만들어갑니다</p>
      </div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-top: 60px;">
        <div style="height: 400px; background: #e0e0e0;"></div>
        <div>
          <p style="font-size: 18px; line-height: 1.9; color: #555;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            <br><br>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션 2: 연혁 (배경색) -->
  <section class="section" style="padding: 100px 0; background: #f8f8f8;">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">회사 연혁</h4>
        <p class="sub-tit">끊임없는 성장의 발자취</p>
      </div>
      <div style="max-width: 800px; margin: 60px auto 0;">
        <!-- 연혁 아이템 예시 -->
        <div style="display: flex; gap: 30px; padding: 30px 0; border-bottom: 1px solid #ddd;">
          <span style="font-size: 24px; font-weight: 700; color: var(--uw-primary); min-width: 80px;">2024</span>
          <div>
            <p style="color: #333;">신규 연구소 설립</p>
            <p style="color: #333; margin-top: 8px;">ISO 9001 인증 획득</p>
          </div>
        </div>
        <div style="display: flex; gap: 30px; padding: 30px 0; border-bottom: 1px solid #ddd;">
          <span style="font-size: 24px; font-weight: 700; color: var(--uw-primary); min-width: 80px;">2020</span>
          <div>
            <p style="color: #333;">법인 설립</p>
            <p style="color: #333; margin-top: 8px;">첫 번째 제품 출시</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션 3: 인증/수상 -->
  <section class="section" style="padding: 100px 0;">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">인증 및 수상</h4>
        <p class="sub-tit">신뢰할 수 있는 기술력을 인정받았습니다</p>
      </div>
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; margin-top: 60px;">
        <div style="aspect-ratio: 1/1; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">인증서 1</div>
        <div style="aspect-ratio: 1/1; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">인증서 2</div>
        <div style="aspect-ratio: 1/1; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">인증서 3</div>
        <div style="aspect-ratio: 1/1; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">인증서 4</div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
