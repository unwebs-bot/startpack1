# WordPress Starter Theme v2.0

기업 홈페이지 제작을 위한 WordPress 스타터 테마입니다.
**휴먼 에러 최소화**와 **제작 속도 향상**을 목표로 설계되었습니다.

---

## Quick Start

```bash
# 1. 테마 폴더에 복사
cp -r starter-pack-v1 /path/to/wordpress/wp-content/themes/my-theme

# 2. inc/config.php 수정 (회사 정보, 네비게이션)

# 3. assets/css/layout.css의 --uw-primary 색상 변경

# 4. WordPress 관리자에서 테마 활성화
```

---

## 프로젝트 구조

```
starter-pack-v1/
├── assets/
│   ├── css/
│   │   ├── style.css          # 메인 진입점 (@import)
│   │   ├── reset.css          # CSS 리셋 + 접근성
│   │   ├── layout.css         # CSS 변수 + 레이아웃
│   │   ├── page.css           # 페이지별 스타일 (빈 파일)
│   │   ├── animate.css        # 애니메이션
│   │   ├── responsive.css     # 반응형 보조
│   │   └── cpt/               # CPT 전용 스타일
│   ├── js/
│   │   └── CPT/               # CPT 전용 스크립트
│   └── images/                # 이미지 리소스
├── inc/
│   ├── config.php             # 중앙 설정 파일 ★
│   ├── uw-board/              # 게시판 CPT
│   ├── uw-gallery/            # 갤러리 CPT
│   └── uw-inquiry/            # 문의폼 CPT
├── template-parts/
│   ├── common/                # 공통 컴포넌트
│   └── header/                # 헤더 네비게이션
├── header.php
├── footer.php
├── front-page.php
├── functions.php
└── style.css                  # 테마 정보
```

---

## 설정 방법

### 1. 회사 정보 수정 (`inc/config.php`)

```php
'company' => array(
    'name'      => '회사명',          // 필수
    'name_en'   => 'Company Name',   // 필수
    'ceo'       => '대표자명',
    'tel'       => '02-0000-0000',
    'fax'       => '02-0000-0001',
    'email'     => 'info@example.com',
    'address'   => '서울특별시 강남구...',
    'biz_no'    => '000-00-00000',
),
```

### 2. 네비게이션 메뉴 수정 (`inc/config.php`)

```php
'nav' => array(
    'about' => array(
        'label' => 'About Us',
        'url'   => '/about/ceo/',
        'items' => array(
            array('slug' => '/about/ceo/', 'label' => 'CEO 인사말'),
            array('slug' => '/about/history/', 'label' => '연혁'),
        ),
    ),
    // 메뉴 추가/삭제...
),
```

### 3. 브랜드 컬러 변경 (`assets/css/layout.css`)

```css
:root {
  --uw-primary: #1d8795;  /* 이 값만 변경하면 됨 */
}
```

---

## CSS 변수 시스템

| 변수 | 용도 | 기본값 |
|------|------|--------|
| `--uw-primary` | 메인 브랜드 색상 | `#1d8795` |
| `--uw-text` | 본문 텍스트 | `#111` |
| `--uw-text-light` | 보조 텍스트 | `#666` |
| `--uw-bg` | 배경색 | `#f8f9fa` |
| `--uw-border` | 테두리 | `#e5e5e5` |
| `--uw-error` | 에러 | `#dc3545` |
| `--uw-success` | 성공 | `#28a745` |
| `--uw-max-width` | 컨테이너 너비 | `1200px` |
| `--uw-gutter` | 좌우 여백 | `20px` |
| `--uw-header-height` | 헤더 높이 | `80px` |

---

## Helper 함수

```php
// 회사 정보 가져오기
starter_company();              // 전체 배열
starter_company('tel');         // 특정 키

// 네비게이션 가져오기
starter_nav();                  // 전체 메뉴
starter_nav('about');           // 특정 섹션

// SNS 링크 가져오기
starter_sns();                  // 빈 값 제외 전체
starter_sns('instagram');       // 특정 SNS

// 현재 페이지 섹션 감지
starter_current_nav_section();  // about, business 등 반환
```

---

## 내장 CPT (Custom Post Type)

### 1. Board (게시판)
```php
[uw_board name="notice"]
[uw_board name="notice" skin="style02"]
[latest_posts id="notice" url="/support/notice/" limit="3"]
```

### 2. Gallery (갤러리)
```php
[uw_gallery name="portfolio"]
```

### 3. Inquiry (문의폼)
```php
[uw_inquiry_form id="123"]
```

---

## 보안 기능

- **HTTP 보안 헤더**: X-XSS-Protection, X-Content-Type-Options, X-Frame-Options
- **AJAX Nonce 검증**: 모든 폼 제출에 적용
- **입력값 살균**: sanitize_text_field, wp_kses_post, esc_html, esc_attr
- **파일 업로드 검증**: MIME 타입 검사 (fileinfo)
- **세션 보안**: HttpOnly, SameSite, Secure 쿠키 설정
- **캡챠**: 암호학적으로 안전한 random_int() 사용

---

## 웹 접근성 (WCAG 2.1)

- Skip Navigation 링크
- ARIA landmarks (banner, main, contentinfo)
- Focus visible 스타일
- prefers-reduced-motion 지원
- Screen Reader 전용 클래스 (.sr-only)

---

## 성능 최적화

- DNS Prefetch / Preconnect
- Lazy Loading (WordPress 5.5+)
- Decoding async for images
- CSS 변수 기반 일관된 스타일링

---

## 브라우저 지원

- Chrome (최신)
- Firefox (최신)
- Safari (최신)
- Edge (최신)
- iOS Safari
- Android Chrome

---

## 라이선스

MIT License

---

## 문서

자세한 제작 가이드는 [docs/production-manual.md](docs/production-manual.md)를 참조하세요.
