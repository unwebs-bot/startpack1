<?php
/**
 * Front Page Template
 */
get_header();
?>

<main class="uw-main" id="main-content" role="main">

  <!-- 섹션 1: 서비스 소개 -->
  <section id="services" class="section" style="padding: 100px 0;">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">서비스 소개</h4>
        <p class="sub-tit">최고의 기술력으로 고객 만족을 실현합니다</p>
      </div>
      <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
        <div style="padding: 40px; background: #f5f5f5; text-align: center;">서비스 1</div>
        <div style="padding: 40px; background: #f5f5f5; text-align: center;">서비스 2</div>
        <div style="padding: 40px; background: #f5f5f5; text-align: center;">서비스 3</div>
      </div>
    </div>
  </section>

  <!-- 섹션 2: 회사 소개 (배경색) -->
  <section id="about" class="section" style="padding: 100px 0; background: #f8f8f8;">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">회사 소개</h4>
        <p class="sub-tit">20년 전통의 기술력과 신뢰를 바탕으로 성장해왔습니다</p>
      </div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center;">
        <div style="height: 300px; background: #ddd;"></div>
        <div>
          <p style="line-height: 1.8; color: #666;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션 3: 프로젝트 -->
  <section id="projects" class="section" style="padding: 100px 0;">
    <div class="area">
      <div class="tit-box">
        <h4 class="main-tit">프로젝트</h4>
        <p class="sub-tit">다양한 프로젝트 경험을 보유하고 있습니다</p>
      </div>
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        <div style="aspect-ratio: 1/1; background: #e0e0e0;"></div>
        <div style="aspect-ratio: 1/1; background: #e0e0e0;"></div>
        <div style="aspect-ratio: 1/1; background: #e0e0e0;"></div>
        <div style="aspect-ratio: 1/1; background: #e0e0e0;"></div>
      </div>
    </div>
  </section>

  <!-- 섹션 4: 문의하기 (어두운 배경) -->
  <section id="contact" class="section" style="padding: 100px 0; background: #222; color: #fff;">
    <div class="area">
      <div class="tit-box" style="color: #fff;">
        <h4 class="main-tit" style="color: #fff;">문의하기</h4>
        <p class="sub-tit" style="color: rgba(255,255,255,0.7);">프로젝트에 대해 상담해 드립니다</p>
      </div>
      <div style="text-align: center;">
        <a href="#" style="display: inline-block; padding: 15px 40px; background: var(--uw-primary); color: #fff; border-radius: 4px;">문의하기</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
