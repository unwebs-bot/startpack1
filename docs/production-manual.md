# Production Manual - WordPress Starter Theme

기업 홈페이지 제작 실무 가이드

---

## 목차

1. [프로젝트 시작](#1-프로젝트-시작)
2. [기본 설정](#2-기본-설정)
3. [페이지 제작](#3-페이지-제작)
4. [CPT 활용](#4-cpt-활용)
5. [스타일 가이드](#5-스타일-가이드)
6. [보안 체크리스트](#6-보안-체크리스트)
7. [배포 전 점검](#7-배포-전-점검)
8. [트러블슈팅](#8-트러블슈팅)

---

## 1. 프로젝트 시작

### 1.1 테마 복사

```bash
# starter-pack을 새 프로젝트명으로 복사
cp -r starter-pack-v1 /path/to/wordpress/wp-content/themes/client-theme

# style.css의 Theme Name 변경
```

### 1.2 style.css 테마 정보 수정

```css
/*
Theme Name: 클라이언트 테마
Description: 클라이언트용 커스텀 테마
Version: 1.0
Author: Your Agency
*/
```

### 1.3 필수 이미지 교체

```
assets/images/
├── logo.png              # 헤더 로고 (권장: 180x36)
├── og-image.jpg          # OG 이미지 (1200x630)
├── main_visual_01.png    # 메인 비주얼 (1920x1080)
└── favicon.ico           # 파비콘 (32x32)
```

---

## 2. 기본 설정

### 2.1 회사 정보 설정 (`inc/config.php`)

**반드시 수정해야 하는 항목:**

```php
'company' => array(
    'name'      => '실제 회사명',           // ★ 필수
    'name_en'   => 'Real Company Name',    // ★ 필수
    'ceo'       => '홍길동',                // 대표자명
    'tel'       => '02-1234-5678',         // 대표 전화
    'fax'       => '02-1234-5679',         // 팩스
    'email'     => 'contact@company.com',  // 대표 이메일
    'address'   => '서울시 강남구...',      // 주소
    'biz_no'    => '123-45-67890',         // 사업자번호
    'corp_no'   => '1234-5678-9012',       // 법인번호 (선택)
),
```

### 2.2 네비게이션 구조 설정

**메뉴 추가 예시:**

```php
'nav' => array(
    'about' => array(
        'label' => '회사소개',        // GNB에 표시될 텍스트
        'url'   => '/about/ceo/',    // 첫 번째 서브메뉴 URL
        'items' => array(
            array('slug' => '/about/ceo/', 'label' => '인사말'),
            array('slug' => '/about/history/', 'label' => '연혁'),
            array('slug' => '/about/organization/', 'label' => '조직도'),
            array('slug' => '/about/location/', 'label' => '오시는 길'),
        ),
    ),
    // 메뉴 추가...
),
```

**주의사항:**
- `slug`는 WordPress 페이지의 퍼머링크와 일치해야 함
- 부모 메뉴의 `url`은 `items`의 첫 번째 `slug`와 동일하게 설정

### 2.3 브랜드 컬러 설정 (`assets/css/layout.css`)

```css
:root {
  /* 이 값만 변경하면 전체 색상이 조정됨 */
  --uw-primary: #0066cc;  /* 클라이언트 브랜드 컬러 */
}
```

**자동 생성되는 파생 색상:**
- `--uw-primary-dark`: 20% 어둡게
- `--uw-primary-light`: 80% 밝게

---

## 3. 페이지 제작

### 3.1 서브페이지 템플릿

**기본 구조:**

```php
<?php
/**
 * Template Name: 회사소개 - 인사말
 */
get_header();
?>

<?php get_template_part('template-parts/common/sub-visual'); ?>

<main id="main-content" role="main">
  <section class="uw-section">
    <div class="uw-container">

      <?php get_template_part('template-parts/common/section-header', null, [
        'label' => 'CEO Message',
        'title' => '인사말',
        'desc'  => '고객 여러분께 인사드립니다.',
        'align' => 'center'
      ]); ?>

      <div class="content-area">
        <?php the_content(); ?>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
```

### 3.2 섹션 헤더 컴포넌트

```php
get_template_part('template-parts/common/section-header', null, [
    'label'   => 'About Us',        // 영문 소제목 (선택)
    'title'   => '회사 소개',         // 메인 제목 (필수)
    'desc'    => '설명 텍스트...',    // 설명 (선택)
    'align'   => 'center',          // left(기본) 또는 center
    'class'   => 'custom-class',    // 추가 CSS 클래스
    'animate' => true,              // 애니메이션 (기본: true)
]);
```

### 3.3 서브 비주얼 배경 이미지

`assets/css/layout.css`에서 섹션별 배경 설정:

```css
.sub-visual.about .sub-visual-bg {
  background-image: url('../images/sub_visual_about.jpg');
}

.sub-visual.business .sub-visual-bg {
  background-image: url('../images/sub_visual_business.jpg');
}
```

---

## 4. CPT 활용

### 4.1 게시판 (Board)

**게시판 생성:**
1. 관리자 > 게시판 관리
2. 새 게시판 추가 (예: notice, news, faq)
3. 페이지에 숏코드 삽입

**숏코드 옵션:**

```php
// 기본 목록
[uw_board name="notice"]

// 스킨 지정
[uw_board name="notice" skin="style01"]  // 테이블형
[uw_board name="notice" skin="style02"]  // 미니멀 카드
[uw_board name="notice" skin="style03"]  // 썸네일 카드

// 최신글 위젯
[latest_posts id="notice" url="/support/notice/" limit="3"]

// 여러 게시판 통합
[latest_posts id="notice,news" url="/community/" limit="5"]
```

### 4.2 갤러리 (Gallery)

```php
// 기본
[uw_gallery name="portfolio"]

// 옵션
[uw_gallery name="portfolio" columns="4" lightbox="true"]
```

### 4.3 문의폼 (Inquiry)

**폼 생성:**
1. 관리자 > 입력폼 관리
2. 폼 설정 (필드, 이메일 알림, 캡챠 등)
3. 페이지에 숏코드 삽입

```php
[uw_inquiry_form id="123"]
```

**알림 이메일 설정:**
- 폼 설정에서 '알림 이메일' 필드에 수신할 이메일 입력
- 여러 개는 콤마로 구분: `admin@company.com, manager@company.com`

---

## 5. 스타일 가이드

### 5.1 CSS 클래스 네이밍

**BEM 방식 준수:**

```css
/* Block */
.uw-card { }

/* Element */
.uw-card__title { }
.uw-card__content { }

/* Modifier */
.uw-card--featured { }
.uw-card--small { }
```

**네이밍 규칙:**
- 접두사: `uw-` (프로젝트별 변경 가능)
- 소문자 + 하이픈

### 5.2 반응형 브레이크포인트

```css
/* Desktop First */
@media (max-width: 1024px) { /* Tablet */ }
@media (max-width: 768px) { /* Mobile */ }

/* 변수로 정의된 값들 */
:root {
  /* Desktop */
  --uw-section-padding: 100px;
  --uw-header-height: 80px;
  --uw-gutter: 20px;
}

@media (max-width: 1024px) {
  :root {
    --uw-section-padding: 80px;
    --uw-header-height: 70px;
  }
}

@media (max-width: 768px) {
  :root {
    --uw-section-padding: 60px;
    --uw-header-height: 60px;
    --uw-gutter: 16px;
  }
}
```

### 5.3 애니메이션 사용

```html
<!-- 기본 fade-up -->
<div data-animate="fade-up">콘텐츠</div>

<!-- 딜레이 추가 -->
<div class="delay-200" data-animate="fade-up">0.2초 후</div>
<div class="delay-400" data-animate="fade-up">0.4초 후</div>

<!-- 모바일에서 자동 비활성화 (768px 이하) -->
```

### 5.4 유틸리티 클래스

```html
<div class="hidden-mobile">모바일에서 숨김</div>
<div class="hidden-desktop">데스크톱에서 숨김</div>
<span class="sr-only">스크린리더 전용</span>
```

---

## 6. 보안 체크리스트

### 6.1 배포 전 필수 확인

- [ ] `WP_DEBUG`를 `false`로 설정
- [ ] 불필요한 관리자 계정 삭제
- [ ] 강력한 비밀번호 사용
- [ ] wp-config.php 권한 설정 (644 또는 600)
- [ ] uploads 폴더 권한 확인 (755)
- [ ] SSL 인증서 설치 및 HTTPS 강제

### 6.2 내장 보안 기능

**자동 적용됨:**
- X-XSS-Protection 헤더
- X-Content-Type-Options 헤더
- X-Frame-Options 헤더
- Referrer-Policy 헤더
- 모든 사용자 입력 살균
- AJAX nonce 검증
- 파일 업로드 MIME 검증

### 6.3 추가 권장 사항

```php
// wp-config.php에 추가
define('DISALLOW_FILE_EDIT', true);  // 관리자 테마/플러그인 편집 비활성화
define('WP_AUTO_UPDATE_CORE', true); // 자동 업데이트
```

---

## 7. 배포 전 점검

### 7.1 기능 점검

- [ ] 모든 페이지 링크 정상 작동
- [ ] 게시판 글쓰기/수정/삭제 테스트
- [ ] 문의폼 전송 및 이메일 수신 확인
- [ ] 캡챠 정상 작동
- [ ] 모바일 메뉴 동작
- [ ] 이미지 lazy loading 확인

### 7.2 SEO 점검

- [ ] 페이지별 title 태그 확인
- [ ] OG 태그 확인 (Facebook Debugger)
- [ ] robots.txt 확인
- [ ] sitemap.xml 생성 (SEO 플러그인)
- [ ] 404 페이지 확인

### 7.3 성능 점검

```bash
# Lighthouse 점수 목표
Performance: 80+
Accessibility: 90+
Best Practices: 90+
SEO: 90+
```

### 7.4 접근성 점검

- [ ] 키보드 탐색 테스트 (Tab, Enter, Esc)
- [ ] Skip Navigation 동작 확인
- [ ] 스크린리더 테스트 (NVDA, VoiceOver)
- [ ] 색상 대비 확인 (4.5:1 이상)

---

## 8. 트러블슈팅

### 8.1 자주 발생하는 문제

**Q: 메뉴가 표시되지 않음**
```
A: inc/config.php의 nav 배열 확인
   - slug 경로가 실제 페이지 URL과 일치하는지 확인
```

**Q: 스타일이 적용되지 않음**
```
A: 브라우저 캐시 삭제
   - CSS 버전 번호 변경 (functions.php)
```

**Q: 이메일이 발송되지 않음**
```
A: SMTP 플러그인 설치 권장
   - WP Mail SMTP 추천
   - 서버 mail() 함수 지원 여부 확인
```

**Q: 파일 업로드 실패**
```
A: php.ini 설정 확인
   - upload_max_filesize = 64M
   - post_max_size = 64M
   - max_execution_time = 300
```

### 8.2 디버깅

```php
// wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// 로그 위치: wp-content/debug.log
```

---

## 버전 히스토리

| 버전 | 날짜 | 변경 내용 |
|------|------|----------|
| 2.0 | 2024-01 | CSS 변수 시스템 개선, 보안 강화, 접근성 개선 |
| 1.0 | 2023-06 | 초기 버전 |

---

## 지원

문의: [제작사 이메일]
