/**
 * Header System
 *
 * Features:
 * - Scroll detection (header background change)
 * - GNB dropdown (PC - each menu style)
 * - Sitemap overlay (PC fullscreen menu)
 * - Mobile navigation (slide-in accordion menu)
 */

(function () {
  'use strict';

  // ==========================================================================
  // DOM Elements
  // ==========================================================================
  const header = document.querySelector('.uw-header');
  const gnbItems = document.querySelectorAll('.uw-gnb__item');
  const sitemapBtn = document.querySelector('.uw-header__sitemap-btn');
  const sitemap = document.querySelector('.uw-sitemap');
  const sitemapCols = document.querySelectorAll('.uw-sitemap__col');
  const sitemapLinks = document.querySelectorAll('.uw-sitemap__link');

  // Mobile Navigation Elements
  const mobileBtn = document.querySelector('.uw-mobile-btn');
  const mobileNav = document.querySelector('.uw-mobile-nav');
  const mobileOverlay = document.querySelector('.uw-mobile-overlay');
  const mobileAccordionTriggers = document.querySelectorAll('.uw-mobile-nav__trigger');

  // Scroll position for scroll lock
  let scrollPosition = 0;

  // ==========================================================================
  // 1. Scroll Detection
  // ==========================================================================
  function handleScroll() {
    if (!header) return;

    const scrollY = window.scrollY || window.pageYOffset;
    const isSitemapOpen = document.body.classList.contains('sitemap-open');
    const isMobileOpen = document.body.classList.contains('mobile-menu-open');

    if (scrollY > 50) {
      header.classList.add('is-scrolled');
    } else {
      // Don't remove scrolled state if overlay menus are open
      if (!isSitemapOpen && !isMobileOpen) {
        header.classList.remove('is-scrolled');
      }
    }
  }

  // ==========================================================================
  // 2. GNB Dropdown (PC - Each Menu Style)
  // ==========================================================================
  function initGnbDropdown() {
    gnbItems.forEach((item) => {
      const subMenu = item.querySelector('.uw-gnb__sub');

      if (subMenu) {
        item.addEventListener('mouseenter', () => {
          subMenu.classList.add('is-open');
        });

        item.addEventListener('mouseleave', () => {
          subMenu.classList.remove('is-open');
        });

        // Keyboard accessibility
        const link = item.querySelector('.uw-gnb__link');
        if (link) {
          link.addEventListener('focus', () => {
            subMenu.classList.add('is-open');
          });
        }

        // Close on blur from last submenu item
        const lastSubLink = subMenu.querySelector('.uw-gnb__sub-item:last-child .uw-gnb__sub-link');
        if (lastSubLink) {
          lastSubLink.addEventListener('blur', () => {
            subMenu.classList.remove('is-open');
          });
        }
      }
    });
  }

  // ==========================================================================
  // 3. Sitemap Overlay (PC Fullscreen Menu)
  // ==========================================================================
  function toggleSitemap() {
    document.body.classList.toggle('sitemap-open');

    if (document.body.classList.contains('sitemap-open')) {
      header.classList.add('is-scrolled');
      // Trap focus in sitemap
      if (sitemap) {
        const firstLink = sitemap.querySelector('.uw-sitemap__link');
        if (firstLink) {
          setTimeout(() => firstLink.focus(), 600);
        }
      }
    } else {
      if (window.scrollY <= 50) {
        header.classList.remove('is-scrolled');
      }
      // Return focus to sitemap button
      if (sitemapBtn) {
        sitemapBtn.focus();
      }
    }
  }

  function closeSitemap() {
    document.body.classList.remove('sitemap-open');
    if (window.scrollY <= 50) {
      header.classList.remove('is-scrolled');
    }
  }

  function initSitemap() {
    // Toggle button
    if (sitemapBtn) {
      sitemapBtn.addEventListener('click', toggleSitemap);
    }

    // Hover effect on sitemap links
    sitemapLinks.forEach((link) => {
      link.addEventListener('mouseenter', () => {
        const parentCol = link.closest('.uw-sitemap__col');
        if (parentCol) {
          parentCol.classList.add('is-active');
        }
      });

      link.addEventListener('mouseleave', () => {
        sitemapCols.forEach((col) => col.classList.remove('is-active'));
      });
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && document.body.classList.contains('sitemap-open')) {
        closeSitemap();
      }
    });
  }

  // ==========================================================================
  // 4. Mobile Navigation (Slide-in Accordion)
  // ==========================================================================

  /**
   * Open mobile navigation
   */
  function openMobileNav() {
    // Save scroll position before locking
    scrollPosition = window.pageYOffset;

    document.body.classList.add('mobile-menu-open');
    document.body.style.top = `-${scrollPosition}px`;

    if (mobileNav) {
      mobileNav.setAttribute('aria-hidden', 'false');
    }
    if (mobileOverlay) {
      mobileOverlay.setAttribute('aria-hidden', 'false');
    }
    if (mobileBtn) {
      mobileBtn.setAttribute('aria-expanded', 'true');
    }

    // Focus first menu item for accessibility
    if (mobileNav) {
      const firstFocusable = mobileNav.querySelector('a, button');
      if (firstFocusable) {
        setTimeout(() => firstFocusable.focus(), 400);
      }
    }
  }

  /**
   * Close mobile navigation
   */
  function closeMobileNav() {
    document.body.classList.remove('mobile-menu-open');
    document.body.style.top = '';

    // Restore scroll position
    window.scrollTo(0, scrollPosition);

    if (mobileNav) {
      mobileNav.setAttribute('aria-hidden', 'true');
    }
    if (mobileOverlay) {
      mobileOverlay.setAttribute('aria-hidden', 'true');
    }
    if (mobileBtn) {
      mobileBtn.setAttribute('aria-expanded', 'false');
      mobileBtn.focus();
    }

    // Close all accordion items
    closeAllAccordions();
  }

  /**
   * Toggle mobile navigation
   */
  function toggleMobileNav() {
    if (document.body.classList.contains('mobile-menu-open')) {
      closeMobileNav();
    } else {
      openMobileNav();
    }
  }

  /**
   * Close all accordion panels
   */
  function closeAllAccordions() {
    const items = document.querySelectorAll('.uw-mobile-nav__item');
    items.forEach((item) => {
      item.classList.remove('is-open');
      const trigger = item.querySelector('.uw-mobile-nav__trigger');
      const panel = item.querySelector('.uw-mobile-nav__panel');
      if (trigger) {
        trigger.setAttribute('aria-expanded', 'false');
      }
      if (panel) {
        panel.setAttribute('aria-hidden', 'true');
      }
    });
  }

  /**
   * Toggle accordion panel (single expand mode)
   * @param {HTMLElement} trigger - The clicked trigger button
   */
  function toggleAccordion(trigger) {
    const item = trigger.closest('.uw-mobile-nav__item');
    const panel = item.querySelector('.uw-mobile-nav__panel');
    const isOpen = item.classList.contains('is-open');

    // Close all other accordions first (single expand mode)
    closeAllAccordions();

    // Toggle current accordion
    if (!isOpen) {
      item.classList.add('is-open');
      trigger.setAttribute('aria-expanded', 'true');
      if (panel) {
        panel.setAttribute('aria-hidden', 'false');
      }
    }
  }

  /**
   * Initialize mobile navigation
   */
  function initMobileNav() {
    // Toggle button (hamburger)
    if (mobileBtn) {
      mobileBtn.addEventListener('click', toggleMobileNav);
    }

    // Overlay click to close
    if (mobileOverlay) {
      mobileOverlay.addEventListener('click', closeMobileNav);
    }

    // Accordion triggers
    mobileAccordionTriggers.forEach((trigger) => {
      trigger.addEventListener('click', () => {
        toggleAccordion(trigger);
      });
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && document.body.classList.contains('mobile-menu-open')) {
        closeMobileNav();
      }
    });

    // Handle resize - close mobile nav when switching to desktop
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        if (window.innerWidth > 1024 && document.body.classList.contains('mobile-menu-open')) {
          closeMobileNav();
        }
      }, 250);
    });
  }

  // ==========================================================================
  // 5. Initialize
  // ==========================================================================
  function init() {
    // Scroll handler
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // Initial check

    // GNB Dropdown
    initGnbDropdown();

    // Sitemap
    initSitemap();

    // Mobile Navigation
    initMobileNav();
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // ==========================================================================
  // 6. Public API (for external access if needed)
  // ==========================================================================
  window.uwHeader = {
    toggleSitemap: toggleSitemap,
    closeSitemap: closeSitemap,
    openMobileNav: openMobileNav,
    closeMobileNav: closeMobileNav,
    toggleMobileNav: toggleMobileNav,
    toggleAccordion: toggleAccordion,
    closeAllAccordions: closeAllAccordions
  };

})();
