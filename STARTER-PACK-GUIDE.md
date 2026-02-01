# WordPress Starter Pack v1.0 - 운영 가이드

## 목차

1. [개요](#1-개요)
2. [빠른 시작](#2-빠른-시작)
3. [파일 구조](#3-파일-구조)
4. [설정 가이드](#4-설정-가이드)
5. [CPT 모듈 사용법](#5-cpt-모듈-사용법)
6. [CSS 시스템](#6-css-시스템)
7. [보안 감사 보고서](#7-보안-감사-보고서)
8. [회고 분석](#8-회고-분석)
9. [개선 아이디어 및 액션 아이템](#9-개선-아이디어-및-액션-아이템)

---

## 1. 개요

### 1.1 스타터팩이란?

워드프레스 기업 웹사이트 제작을 위한 **프로덕션 레디** 테마 템플릿입니다.

**주요 특징:**
- 기업 사이트에 최적화된 구조
- 3개의 CPT 모듈 (게시판, 문의폼, 갤러리)
- 반응형 헤더/푸터 시스템
- 중앙화된 설정 관리
- 보안 헤더 기본 적용

### 1.2 기술 스택

| 항목 | 기술 |
|------|------|
| PHP | 7.4+ |
| WordPress | 6.0+ |
| CSS | CSS3 + Custom Properties |
| JS | Vanilla JS (jQuery 선택적) |
| 폰트 | Poppins (영문) + Pretendard (한글) |

---

## 2. 빠른 시작

### 2.1 설치

```bash
# 1. 테마 폴더에 복사
wp-content/themes/your-project-name/

# 2. 워드프레스 관리자에서 테마 활성화
```

### 2.2 초기 설정 체크리스트

- [ ] `inc/config.php` - 회사 정보 수정
- [ ] `inc/config.php` - 네비게이션 메뉴 수정
- [ ] `assets/images/logo.png` - 로고 교체
- [ ] `assets/images/og-image.jpg` - OG 이미지 교체
- [ ] `assets/css/layout/layout.css` - `--uw-primary` 색상 변경
- [ ] 워드프레스 퍼머링크 설정: `/%postname%/`

### 2.3 필수 페이지 생성

| 페이지 | 슬러그 | 템플릿 |
|--------|--------|--------|
| 회사소개 | /company/intro/ | page-company-intro.php |
| 문의하기 | /contact/ | 기본 페이지 + 숏코드 |

---

## 3. 파일 구조

```
starter-pack-v1/
├── assets/
│   ├── css/
│   │   ├── layout/           # 레이아웃 CSS
│   │   │   ├── layout.css    # 변수, 컨테이너, 공통
│   │   │   └── header.css    # 헤더 전용
│   │   ├── reset.css         # CSS 리셋
│   │   └── style.css         # 메인 스타일 (import)
│   ├── js/
│   │   ├── header.js         # 헤더 인터랙션
│   │   ├── footer.js         # 푸터/모달
│   │   └── main.js           # 공통 스크립트
│   └── images/
│
├── inc/
│   ├── config.php            # 중앙 설정 파일 ★
│   ├── uw-board/             # 게시판 CPT 모듈
│   │   ├── class-uw-board-cpt.php
│   │   ├── class-uw-board-admin.php
│   │   ├── class-uw-board-engine.php
│   │   └── templates/
│   │       ├── list-style01.php
│   │       ├── list-style02.php
│   │       └── list-style03.php
│   ├── uw-inquiry/           # 문의폼 CPT 모듈
│   └── uw-gallery/           # 갤러리 CPT 모듈
│
├── template-parts/
│   ├── common/
│   │   ├── sub-visual.php    # 서브페이지 비주얼
│   │   └── section-header.php
│   ├── header/
│   │   ├── nav.php           # PC 네비게이션
│   │   └── nav-mobile.php    # 모바일 네비게이션
│   └── footer/
│       ├── footer-main.php
│       └── footer-modal.php
│
├── page-templates/           # 페이지 템플릿
│   └── page-company-intro.php
│
├── functions.php             # 테마 함수
├── header.php
├── footer.php
├── front-page.php            # 메인 페이지
├── page.php                  # 기본 서브페이지
└── style.css                 # 테마 정보
```

---

## 4. 설정 가이드

### 4.1 회사 정보 설정 (`inc/config.php`)

```php
'company' => array(
    'name'      => '회사명',           // 필수
    'name_en'   => 'Company Name',    // 영문명
    'ceo'       => '대표자명',
    'tel'       => '02-0000-0000',
    'fax'       => '02-0000-0001',
    'email'     => 'info@example.com',
    'address'   => '서울특별시 강남구 테헤란로 123',
    'biz_no'    => '000-00-00000',    // 사업자등록번호
    'corp_no'   => '0000-0000-0000',  // 법인등록번호
),
```

### 4.2 네비게이션 메뉴 설정

```php
'nav' => array(
    'company' => array(
        'label' => 'COMPANY',           // GNB 메뉴명
        'url'   => '/company/intro/',   // 대표 URL
        'items' => array(               // 서브메뉴
            array('slug' => '/company/intro/', 'label' => '기업 소개'),
            array('slug' => '/company/vision/', 'label' => '기업 비전'),
        ),
    ),
    // 추가 메뉴...
),
```

### 4.3 CSS 변수 커스터마이징 (`assets/css/layout/layout.css`)

```css
:root {
  /* Primary Color - 프로젝트별 변경 */
  --uw-primary: #3182f6;

  /* Layout */
  --area-width: 1500px;      /* 컨텐츠 최대 너비 */
  --area-padding: 30px;
  --uw-header-height: 100px;

  /* Typography */
  --uw-font-main: 'Poppins', 'Pretendard', sans-serif;
}
```

---

## 5. CPT 모듈 사용법

### 5.1 게시판 (UW Board)

**숏코드:**
```
[uw_board name="notice"]
[uw_board name="notice" skin="style02"]
```

**스킨 옵션:**
| 스킨 | 설명 |
|------|------|
| style01 | 테이블형 (기본) |
| style02 | 미니멀 카드 |
| style03 | 썸네일 카드 |

**최신글 숏코드:**
```
[latest_posts id="notice,faq" limit="3" url="/notice/"]
```

**게시판 생성:**
1. 워드프레스 관리자 > UW 게시판 > 게시판 관리
2. 새 게시판 추가 (슬러그 필수)
3. 페이지 생성 후 숏코드 삽입

### 5.2 문의폼 (UW Inquiry)

**숏코드:**
```
[uw_inquiry id="contact"]
```

**문의폼 생성:**
1. 관리자 > UW 문의폼 > 문의폼 관리
2. 필드 구성 (텍스트, 이메일, 전화, 파일 등)
3. 알림 이메일 설정
4. 페이지에 숏코드 삽입

### 5.3 갤러리 (UW Gallery)

**숏코드:**
```
[uw_gallery id="press" style="grid"]
[uw_gallery id="video" style="video"]
```

---

## 6. CSS 시스템

### 6.1 표준 섹션 구조

```html
<section id="sectionName" class="section">
  <div class="area">
    <div class="tit-box">
      <h4 class="main-tit">섹션 제목</h4>
      <p class="sub-tit">섹션 설명</p>
    </div>
    <!-- 컨텐츠 -->
  </div>
</section>
```

### 6.2 주요 클래스

| 클래스 | 용도 |
|--------|------|
| `.area` | 컨텐츠 최대 너비 제한 |
| `.section` | 섹션 구분 |
| `.tit-box` | 섹션 타이틀 박스 |
| `.sub-visual` | 서브페이지 비주얼 |
| `.sub-lnb` | 서브페이지 로컬 네비 |

### 6.3 서브페이지 비주얼 사용

```php
<?php get_template_part('template-parts/common/sub-visual'); ?>

<!-- 또는 커스텀 타이틀 -->
<?php
set_query_var('sub_visual_title', '커스텀 타이틀');
get_template_part('template-parts/common/sub-visual');
?>
```

---

## 7. 보안 감사 보고서

### 7.1 감사 요약

| 심각도 | 건수 | 상태 |
|--------|------|------|
| Critical | 2 | 수정 필요 |
| Moderate | 6 | 검토 필요 |
| Minor | 8 | 개선 권장 |

**전체 보안 점수: 6.5/10**

### 7.2 Critical 이슈

#### Issue #1: extract() 함수 사용
**위치:** `inc/uw-board/templates/*.php`

```php
// 취약 코드
extract($args);

// 권장 수정
$slug = $args['slug'] ?? '';
$is_pinned = $args['is_pinned'] ?? false;
$num = $args['num'] ?? '';
$board = $args['board'] ?? array();
```

#### Issue #2: CSRF 토큰 검증 강화 필요
**위치:** `inc/uw-board/class-uw-board-engine.php:551`

```php
// 취약: GET 파라미터 허용
$token = isset($_REQUEST['token']) ? ...

// 권장: POST만 허용
$token = isset($_POST['uw_token']) ? $_POST['uw_token'] : '';
```

### 7.3 Moderate 이슈

1. **캡차 보안 강화 필요** - 세션 기반 검증 개선
2. **파일 업로드 크기 제한 누락** - 100MB 제한 추가 권장
3. **Rate Limiting 미구현** - IP 기반 제한 추가 권장
4. **검색 입력 추가 살균** - LIKE 쿼리 이스케이프 강화
5. **CSP 헤더 미설정** - Content-Security-Policy 추가
6. **Honeypot 필드 미적용** - 스팸 방지 강화

### 7.4 보안 강점

- WordPress nonce 적절히 사용
- `esc_html()`, `esc_url()`, `esc_attr()` 이스케이프 적용
- 파일 업로드 MIME 타입 검증
- `wp_hash_password()` 비밀번호 해싱
- 기본 보안 헤더 적용

---

## 8. 회고 분석

### 8.1 오늘 작업 요약

| 작업 | 상태 |
|------|------|
| 서브페이지 비주얼 섹션 생성 | 완료 |
| 브레드크럼 네비게이션 구현 | 완료 |
| 헤더 Primary Color 제거 (템플릿화) | 완료 |
| Sub-LNB 스타일링 (균등 너비) | 완료 |
| 폰트 설정 (Poppins + Pretendard) | 완료 |
| UW-Board 템플릿 통합 | 완료 |

### 8.2 코드 관점 분석

**잘한 점:**
- BEM 네이밍 컨벤션 일관성 유지
- CSS 변수 활용으로 테마 커스터마이징 용이
- 중앙화된 설정 파일 (`config.php`)로 유지보수성 향상
- 컴포넌트 분리 (template-parts)

**개선 필요:**
- `extract()` 함수 사용으로 보안 취약점 존재
- 일부 인라인 스타일 사용 (front-page.php)
- CSS/JS 버전 관리 미흡 (하드코딩)
- 에러 로깅 시스템 부재

### 8.3 설계 관점 분석

**잘한 점:**
- 모듈화된 CPT 구조 (Board, Inquiry, Gallery)
- 스킨 시스템으로 확장성 확보
- 반응형 설계 (PC/Tablet/Mobile)

**개선 필요:**
- Post Type 상수 정의 필요
- 중복 코드 리팩토링 (검색 필터)
- 의존성 주입 패턴 미적용

### 8.4 프로세스 관점 분석

**잘한 점:**
- 기존 코드 기반 점진적 개선
- 요청사항 명확하게 확인 후 구현

**개선 필요:**
- 문서화 부족
- 테스트 코드 부재
- 버전 태깅 미적용

---

## 9. 개선 아이디어 및 액션 아이템

### 보안 개선 (Priority: High)

| # | 아이디어 | 액션 아이템 |
|---|----------|-------------|
| 1 | **extract() 제거** | `inc/uw-board/templates/*.php`에서 extract() 대신 명시적 변수 할당으로 변경 |
| 2 | **CSRF 토큰 강화** | `class-uw-board-engine.php`의 `can_edit_post()` 메서드에서 POST 전용 토큰 검증 |
| 3 | **Rate Limiting 추가** | `class-uw-inquiry-handler.php`에 IP 기반 transient 제한 (5분에 3회) |
| 4 | **CSP 헤더 추가** | `functions.php`의 `starter_security_headers()`에 Content-Security-Policy 추가 |
| 5 | **Honeypot 필드** | 문의폼에 hidden honeypot 필드 추가하여 봇 스팸 방지 |
| 6 | **파일 업로드 제한** | 업로드 핸들러에 `$max_size = 10 * 1024 * 1024;` (10MB) 검증 추가 |

### 코드 품질 (Priority: Medium)

| # | 아이디어 | 액션 아이템 |
|---|----------|-------------|
| 7 | **상수 정의** | `inc/constants.php` 생성하여 `UW_BOARD_CPT`, `UW_INQUIRY_CPT` 등 정의 |
| 8 | **검색 필터 리팩토링** | `filter_search_title()`, `filter_search_content()` 하나로 통합 |
| 9 | **인라인 스타일 제거** | `front-page.php`, `page-company-intro.php`의 인라인 스타일을 CSS 클래스로 이동 |
| 10 | **버전 관리 자동화** | `wp_enqueue_*`에 `filemtime()` 사용하여 캐시 버스팅 자동화 |
| 11 | **PHPDoc 추가** | 모든 public 메서드에 @param, @return, @throws 문서화 |
| 12 | **에러 로깅** | `UW_Logger` 클래스 생성하여 WP_DEBUG 기반 로깅 구현 |

### UX/접근성 (Priority: Medium)

| # | 아이디어 | 액션 아이템 |
|---|----------|-------------|
| 13 | **alert() 대체** | Toast 알림 시스템 구현하여 `alert()` 대체 |
| 14 | **Focus 스타일** | `:focus-visible` 상태에 명확한 outline 스타일 추가 |
| 15 | **Skip Link 강화** | 모든 주요 영역에 skip navigation 링크 추가 |
| 16 | **Motion 존중** | `@media (prefers-reduced-motion: reduce)` 전체 적용 |
| 17 | **에러 메시지 개선** | 폼 검증 에러 메시지를 인라인으로 표시 |

### 기능 확장 (Priority: Low)

| # | 아이디어 | 액션 아이템 |
|---|----------|-------------|
| 18 | **다크모드 지원** | CSS 변수 기반 다크모드 토글 구현 |
| 19 | **페이지 빌더 호환** | Elementor/Gutenberg 블록 스타일 호환성 테스트 |
| 20 | **다국어 준비** | `__()`, `_e()` 함수로 모든 문자열 래핑 |
| 21 | **SEO 메타 태그** | Open Graph, Twitter Card 메타 태그 자동 생성 |
| 22 | **성능 최적화** | CSS/JS 번들링, lazy loading 이미지 적용 |

### 운영/배포 (Priority: Low)

| # | 아이디어 | 액션 아이템 |
|---|----------|-------------|
| 23 | **테스트 환경** | PHPUnit 기반 단위 테스트 구조 추가 |
| 24 | **CI/CD** | GitHub Actions로 린팅/테스트 자동화 |
| 25 | **버전 태깅** | Git 태그 기반 릴리즈 관리 (v1.0.0, v1.1.0...) |

---

## 부록

### A. 체크리스트: 프로젝트 시작 시

```markdown
## 초기 설정
- [ ] 테마 폴더명 변경
- [ ] style.css 테마 정보 수정
- [ ] inc/config.php 회사 정보 입력
- [ ] inc/config.php 네비게이션 메뉴 설정
- [ ] layout.css --uw-primary 색상 변경
- [ ] 로고 이미지 교체

## 워드프레스 설정
- [ ] 퍼머링크: /%postname%/
- [ ] 정적 첫 페이지 설정
- [ ] 미디어 설정: 썸네일 크기

## 필수 페이지 생성
- [ ] front-page 설정
- [ ] 회사소개 페이지
- [ ] 문의하기 페이지
- [ ] 개인정보처리방침 페이지

## CPT 설정
- [ ] 게시판 생성 (필요시)
- [ ] 문의폼 생성 (필요시)
- [ ] 갤러리 생성 (필요시)

## 최종 확인
- [ ] 반응형 테스트 (PC/Tablet/Mobile)
- [ ] 브라우저 테스트 (Chrome/Safari/Firefox)
- [ ] 폼 제출 테스트
- [ ] 보안 헤더 확인
```

### B. 자주 묻는 질문

**Q: 메뉴 순서를 변경하려면?**
A: `inc/config.php`의 nav 배열 순서를 변경하세요.

**Q: 새 페이지 템플릿을 추가하려면?**
A: `page-templates/` 폴더에 새 PHP 파일 생성 후 상단에 Template Name 주석 추가.

**Q: 게시판 스킨을 커스터마이징하려면?**
A: `inc/uw-board/templates/list-style0X.php`를 복사하여 새 스킨 생성.

**Q: 문의폼 알림 이메일을 변경하려면?**
A: 관리자 > UW 문의폼 > 해당 폼 > 알림 설정에서 수신 이메일 변경.

---

**문서 버전:** 1.0.0
**최종 업데이트:** 2026-01-26
**작성:** Claude Code Assistant
