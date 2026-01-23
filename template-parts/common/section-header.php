<?php
/**
 * Section Header Template
 * 섹션 텍스트 묶음 (레이블, 제목, 설명)
 *
 * @param array $args {
 *   @type string $label     소제목/레이블 (선택, 영문 등)
 *   @type string $title     메인 타이틀 (필수)
 *   @type string $desc      설명 텍스트 (선택)
 *   @type string $align     정렬: left, center (기본: left)
 *   @type string $class     추가 CSS 클래스
 *   @type bool   $animate   애니메이션 적용 여부 (기본: true)
 * }
 *
 * @example
 * get_template_part('template-parts/common/section-header', null, [
 *   'label' => 'About Us',
 *   'title' => '회사 소개',
 *   'desc'  => '최고의 기술력으로 고객 만족을 실현합니다.',
 *   'align' => 'center'
 * ]);
 */

// 기본값 설정
$defaults = array(
  'label'   => '',
  'title'   => '',
  'desc'    => '',
  'align'   => 'left',
  'class'   => '',
  'animate' => true,
);

$args = wp_parse_args($args, $defaults);

// 클래스 구성
$classes = array('uw-section-header');

if ($args['align'] === 'center') {
  $classes[] = 'text-center';
}

if (!empty($args['class'])) {
  $classes[] = esc_attr($args['class']);
}

$class_string = implode(' ', $classes);

// 애니메이션 속성
$animate_attr = $args['animate'] ? 'data-animate="fade-up"' : '';
?>

<div class="<?php echo esc_attr($class_string); ?>">
  <?php if (!empty($args['label'])): ?>
    <span class="uw-section-label" <?php echo $animate_attr; ?>>
      <?php echo esc_html($args['label']); ?>
    </span>
  <?php endif; ?>

  <?php if (!empty($args['title'])): ?>
    <h2 class="uw-section-title <?php echo $args['animate'] ? 'delay-200' : ''; ?>" <?php echo $animate_attr; ?>>
      <?php echo wp_kses_post($args['title']); ?>
    </h2>
  <?php endif; ?>

  <?php if (!empty($args['desc'])): ?>
    <p class="uw-section-desc <?php echo $args['animate'] ? 'delay-400' : ''; ?>" <?php echo $animate_attr; ?>>
      <?php echo wp_kses_post($args['desc']); ?>
    </p>
  <?php endif; ?>
</div>
