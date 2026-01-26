<?php
/**
 * Default Page Template (서브페이지 기본 템플릿)
 */
get_header();
?>

<?php get_template_part('template-parts/common/sub-visual'); ?>

<main class="uw-main" id="main-content" role="main">
  <section class="section" style="padding: 80px 0;">
    <div class="area">
      <?php
      while (have_posts()) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
