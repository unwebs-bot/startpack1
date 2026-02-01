/**
 * Main Visual Slider
 *
 * Features:
 * - Crossfade slide transitions
 * - Background zoom effect
 * - Text enter/exit animations
 * - Progress bar navigation
 * - Auto-play with manual override
 */

(function () {
  'use strict';

  // ==========================================================================
  // DOM Elements
  // ==========================================================================
  const visual = document.querySelector('.uw-visual');
  if (!visual) return;

  const slides = visual.querySelectorAll('.uw-visual__slide');
  const navItems = visual.querySelectorAll('.uw-visual__nav-item');
  const scrollBtn = visual.querySelector('.uw-visual__scroll');

  let currentSlide = 0;
  const slideInterval = 5000;
  let slideTimer = null;

  // ==========================================================================
  // Slide Control
  // ==========================================================================

  /**
   * Show specific slide
   * @param {number} index - Slide index
   */
  function showSlide(index) {
    // 모든 슬라이드/네비 비활성화 + fill 초기화
    slides.forEach(function (slide) { slide.classList.remove('is-active'); });
    navItems.forEach(function (nav) {
      nav.classList.remove('is-active');
      var f = nav.querySelector('.uw-visual__nav-fill');
      if (f) {
        f.style.animation = 'none';
        f.style.width = '0';
      }
    });

    // 활성 슬라이드 설정
    slides[index].classList.add('is-active');
    navItems[index].classList.add('is-active');

    // 활성 fill 프로그레스 시작
    var fill = navItems[index].querySelector('.uw-visual__nav-fill');
    if (fill) {
      fill.offsetHeight; // reflow
      fill.style.width = '';
      fill.style.animation = 'uwVisualProgress ' + (slideInterval / 1000) + 's ease-out forwards';
    }

    currentSlide = index;
  }

  /**
   * Go to next slide
   */
  function nextSlide() {
    var nextIndex = (currentSlide + 1) % slides.length;
    showSlide(nextIndex);
  }

  /**
   * Start auto-play
   */
  function startAutoSlide() {
    // Init first slide progress bar
    var fill = navItems[currentSlide].querySelector('.uw-visual__nav-fill');
    if (fill) {
      fill.style.animation = 'uwVisualProgress ' + (slideInterval / 1000) + 's ease-out forwards';
    }

    slideTimer = setInterval(nextSlide, slideInterval);
  }

  /**
   * Stop auto-play
   */
  function stopAutoSlide() {
    clearInterval(slideTimer);
  }

  /**
   * Navigate to specific slide (manual)
   * @param {number} index - Slide index
   */
  function goToSlide(index) {
    stopAutoSlide();
    showSlide(index);
    slideTimer = setInterval(nextSlide, slideInterval);
  }

  // ==========================================================================
  // Event Listeners
  // ==========================================================================

  // Navigation click
  navItems.forEach(function (item) {
    item.addEventListener('click', function () {
      var index = parseInt(this.getAttribute('data-slide'), 10);
      goToSlide(index);
    });
  });

  // Scroll down button
  if (scrollBtn) {
    scrollBtn.addEventListener('click', function () {
      var nextSection = visual.nextElementSibling;
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: 'smooth' });
      }
    });
  }

  // ==========================================================================
  // Initialize
  // ==========================================================================
  startAutoSlide();

  // Public API
  window.uwVisual = {
    goToSlide: goToSlide,
    startAutoSlide: startAutoSlide,
    stopAutoSlide: stopAutoSlide
  };

})();
