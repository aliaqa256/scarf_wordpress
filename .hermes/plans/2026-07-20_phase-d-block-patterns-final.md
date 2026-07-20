# Phase D: Block Patterns — Final Plan

> **For Implementation:** Extend Gutenberg block patterns for the Scarf Persian e-commerce theme.

**Goal:** Register 15+ reusable block patterns across 5 categories using WordPress Block Patterns API only.

**Current State:** `inc/block-patterns.php` already registers 6 patterns (hero-banner, cta-banner, trust-badges, category-grid, product-showcase, two-column-split, newsletter) with 3 categories (scarf, scarf-hero, scarf-cta). All patterns use RTL-first HTML with Persian text, Vazirmatn font, and design tokens.

**Architecture:**
- Modify: `inc/block-patterns.php` — add new patterns + categories
- Modify: `assets/css/main.css` — add editor-specific + frontend pattern styles
- Modify: `functions.php` — no changes needed (already requires block-patterns.php)

---

## Task 08 — Hero & Promotional Banner Patterns

**Goal:** 3 patterns for hero sections and promotional campaigns.

### Patterns to Add

| Pattern ID | Title | Categories | Description |
|---|---|---|---|
| `scarf/hero-split` | بنر هیرو دو ستونه | scarf, scarf-hero | Two-column hero: 55% text + 45% image, dark background, CTA button |
| `scarf/hero-fullwidth` | بنر هیرو تمام‌عرض | scarf, scarf-hero | Full-width hero with overlay text, gradient background, centered CTA |
| `scarf/promo-banner` | بنر تبلیغاتی | scarf, scarf-hero, scarf-cta | Campaign banner with headline, subtext, dual CTA buttons |

### Implementation Details

**`scarf/hero-split`**
- Two-column layout (55%/45%)
- Background: `--scarf-color-surface` or dark `#1a1a2e`
- H1 heading: `جدیدترین شال و روسری‌ها`
- Paragraph description
- CTA button: `مشاهده محصولات` → links to shop
- Image placeholder with `border-radius: var(--scarf-radius-lg)`
- Responsive: stack vertically on mobile

**`scarf/hero-fullwidth`**
- Single group block with background image/gradient
- Overlay with `rgba(0,0,0,0.4)` gradient
- Centered content: H1 + paragraph + CTA
- Min-height via inline style
- Responsive: reduce padding on mobile

**`scarf/promo-banner`**
- Full-width group with `--scarf-color-primary` background
- H2 headline: `تخفیف ویژه تا ۳۰٪`
- Subtext: `فرصت محدود — همین الان خرید کنید`
- Two buttons: `مشاهده محصولات` (white) + `بیشتر بخوانید` (ghost)
- Responsive: buttons stack on mobile

### CSS Additions (main.css)

```css
/* Block Pattern: Hero Split */
.wp-block-group[class*="scarf-hero-split"] { /* fallback for editor */ }

/* Block Pattern: Hero Fullwidth */
.scarf-pattern-hero-fullwidth { min-height: 400px; }
@media (max-width: 768px) { .scarf-pattern-hero-fullwidth { min-height: 300px; } }

/* Block Pattern: Promo Banner */
.scarf-pattern-promo .wp-block-buttons { gap: var(--scarf-space-3); }
```

---

## Task 09 — Product Block Patterns

**Goal:** 3 patterns for product display and discovery.

### Patterns to Add

| Pattern ID | Title | Categories | Description |
|---|---|---|---|
| `scarf/product-grid-3` | گرید محصولات سه ستونه | scarf | 3-column product grid with header + "مشاهده همه" link |
| `scarf/product-grid-4` | گرید محصولات چهار ستونه | scarf | 4-column product grid with header + "مشاهده همه" link |
| `scarf/product-featured` | محصولات ویژه | scarf | Featured products section with 2-column highlight layout |

### Implementation Details

**`scarf/product-grid-3`**
- Section heading: `محصولات جدید` + link `مشاهده همه →`
- 3-column columns block
- Each column: product card (image placeholder + title + price)
- Image: `border-radius: var(--scarf-radius-md)`
- Price: bold, Persian format `۲۵۰,۰۰۰ تومان`
- Uses `esc_html()` for all text

**`scarf/product-grid-4`**
- Same as 3-column but with 4 columns
- Title: `پرفروش‌ترین‌ها`
- Responsive: 2 cols on tablet, 1 col on mobile

**`scarf/product-featured`**
- Two-column layout
- Left (60%): large featured product card with image + details
- Right (40%): 2 smaller product cards stacked
- Background: `--scarf-color-surface-soft`

### CSS Additions (main.css)

```css
/* Block Pattern: Product Grid */
.scarf-pattern-product-grid .wp-block-columns {
  gap: var(--scarf-space-4);
}
.scarf-pattern-product-card {
  background: var(--scarf-color-surface);
  border: 1px solid var(--scarf-color-border);
  border-radius: var(--scarf-radius-lg);
  overflow: hidden;
  transition: box-shadow 0.15s;
}
.scarf-pattern-product-card:hover {
  box-shadow: var(--scarf-shadow-md);
}
.scarf-pattern-product-card__image {
  aspect-ratio: 1;
  object-fit: cover;
  border-radius: var(--scarf-radius-md);
}
.scarf-pattern-product-card__title {
  font-size: var(--scarf-font-sm);
  line-height: 1.4;
  margin: var(--scarf-space-2) 0;
}
.scarf-pattern-product-card__price {
  font-size: var(--scarf-font-md);
  font-weight: 700;
  color: var(--scarf-color-price);
}
```

---

## Task 10 — Category, CTA & About Patterns

**Goal:** 3 patterns for categories, CTAs, and about sections.

### Patterns to Add

| Pattern ID | Title | Categories | Description |
|---|---|---|---|
| `scarf/category-showcase` | نمایش دسته‌بندی‌ها | scarf | 4-column category cards with image placeholders |
| `scarf/cta-centered` | بنر اقدام مرکزی | scarf, scarf-cta | Centered CTA section with gradient background |
| `scarf/about-section` | درباره ما | scarf | Two-column about section with image + text |

### Implementation Details

**`scarf/category-showcase`**
- Section heading: `دسته‌بندی‌های محبوب`
- 4-column grid
- Each card: image placeholder (1:1 aspect) + label below
- Labels: `شال`, `روسری`, `شال مجلسی`, `روسری نخی`
- Background: `--scarf-color-surface`
- Border: `--scarf-color-border`
- Hover: border-color primary

**`scarf/cta-centered`**
- Full-width group with gradient background
- Centered content: H2 + paragraph + CTA button
- Background: `linear-gradient(135deg, var(--scarf-color-primary-soft), var(--scarf-color-accent-soft))`
- H2: `به دنیای شال و روسری خوش آمدید`
- CTA: `مشاهده محصولات` → shop link

**`scarf/about-section`**
- Two-column layout (50%/50%)
- Left: image placeholder with `border-radius: var(--scarf-radius-lg)`
- Right: H2 `درباره ما` + 2 paragraphs + CTA button
- Text: Persian about content (warm, fashion-oriented)
- Background: `--scarf-color-surface-soft`

### CSS Additions (main.css)

```css
/* Block Pattern: Category Showcase */
.scarf-pattern-category-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--scarf-space-3);
  padding: var(--scarf-space-4);
  background: var(--scarf-color-surface);
  border: 1px solid var(--scarf-color-border);
  border-radius: var(--scarf-radius-lg);
  text-decoration: none;
  color: var(--scarf-color-text);
  transition: border-color 0.15s, box-shadow 0.15s;
}
.scarf-pattern-category-card:hover {
  border-color: var(--scarf-color-primary);
  box-shadow: var(--scarf-shadow-sm);
  text-decoration: none;
  color: var(--scarf-color-text);
}
```

---

## Task 11 — Testimonial & FAQ Patterns

**Goal:** 2 patterns for social proof and support content.

### Patterns to Add

| Pattern ID | Title | Categories | Description |
|---|---|---|---|
| `scarf/testimonials` | نظرات مشتریان | scarf | 3-column testimonial cards with quote + author |
| `scarf/faq-section` | سوالات متداول | scarf | Collapsible FAQ section with headings + answers |

### Implementation Details

**`scarf/testimonials`**
- Section heading: `نظرات مشتریان ما`
- 3-column layout
- Each card: quote icon + paragraph text + author name + role
- Quote: italic, `--scarf-color-text-soft`
- Author: bold, `--scarf-color-text`
- Role: small, `--scarf-color-muted`
- Background: `--scarf-color-surface`
- Border: `--scarf-color-border`
- Border-radius: `--scarf-radius-lg`

**`scarf/faq-section`**
- Section heading: `سوالات متداول`
- 4 FAQ items using `details`/`summary` (native HTML5, no JS needed)
- Each item: `<details>` with `<summary>` (question) + `<p>` (answer)
- Questions (Persian):
  1. `چگونه می‌توانم سفارش دهم؟`
  2. `زمان ارسال سفارش چقدر است؟`
  3. `آیا امکان بازگشت کالا وجود دارد؟`
  4. `روش‌های پرداخت کدامند؟`
- Answers: short Persian text
- Style: accordion-like with border-bottom separators

### CSS Additions (main.css)

```css
/* Block Pattern: Testimonials */
.scarf-pattern-testimonial-card {
  background: var(--scarf-color-surface);
  border: 1px solid var(--scarf-color-border);
  border-radius: var(--scarf-radius-lg);
  padding: var(--scarf-space-6);
}
.scarf-pattern-testimonial-card__quote {
  font-size: var(--scarf-font-md);
  line-height: 1.7;
  color: var(--scarf-color-text-soft);
  font-style: italic;
  margin-bottom: var(--scarf-space-4);
}
.scarf-pattern-testimonial-card__author {
  font-size: var(--scarf-font-sm);
  font-weight: 700;
  color: var(--scarf-color-text);
}
.scarf-pattern-testimonial-card__role {
  font-size: var(--scarf-font-xs);
  color: var(--scarf-color-muted);
}

/* Block Pattern: FAQ */
.scarf-pattern-faq details {
  border-block-end: 1px solid var(--scarf-color-border);
}
.scarf-pattern-faq summary {
  cursor: pointer;
  font-weight: 600;
  padding: var(--scarf-space-4) 0;
  list-style: none;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.scarf-pattern-faq summary::after {
  content: '+';
  font-size: var(--scarf-font-lg);
  color: var(--scarf-color-primary);
  transition: transform 0.2s;
}
.scarf-pattern-faq details[open] summary::after {
  content: '−';
}
.scarf-pattern-faq details p {
  padding-block-end: var(--scarf-space-4);
  color: var(--scarf-color-text-soft);
  line-height: 1.7;
}
```

---

## Task 12 — Sale Banner & Countdown Patterns

**Goal:** 2 patterns for promotional campaigns.

### Patterns to Add

| Pattern ID | Title | Categories | Description |
|---|---|---|---|
| `scarf/sale-banner` | بنر فروش ویژه | scarf, scarf-cta | Full-width sale banner with discount info + CTA |
| `scarf/countdown-promo` | شمارنده فروش ویژه | scarf, scarf-cta | Sale banner with countdown timer (JS-powered) |

### Implementation Details

**`scarf/sale-banner`**
- Full-width group with `--scarf-color-primary` background
- Two-column layout: text (70%) + CTA (30%)
- H2: `فروش ویژه تا ۵۰٪ تخفیف`
- Paragraph: `بهترین شال و روسری‌ها با قیمت‌های استثنایی`
- CTA button: `مشاهده محصولات تخفیف‌دار` → shop link
- Badge: `فروش ویژه` pill badge
- Responsive: stack on mobile

**`scarf/countdown-promo`**
- Full-width group with dark background (`#1a1a2e`)
- Centered content: H2 + countdown display + CTA
- H2: `فروش ویژه پایان می‌یابد`
- Countdown display: 4 boxes (روز, ساعت, دقیقه, ثانیه)
- Each box: number + label, styled as pill
- CTA: `همین الان خرید کنید`
- JavaScript: `countdown-timer.js` for live countdown
- Fallback: if JS fails, show "فرصت محدود" text

### CSS Additions (main.css)

```css
/* Block Pattern: Sale Banner */
.scarf-pattern-sale-banner {
  background: var(--scarf-color-primary);
  border-radius: var(--scarf-radius-lg);
  padding: var(--scarf-space-8);
}
.scarf-pattern-sale-badge {
  display: inline-block;
  background: #fff;
  color: var(--scarf-color-primary);
  padding: var(--scarf-space-1) var(--scarf-space-4);
  border-radius: var(--scarf-radius-pill);
  font-size: var(--scarf-font-sm);
  font-weight: 700;
  margin-bottom: var(--scarf-space-4);
}

/* Block Pattern: Countdown */
.scarf-pattern-countdown {
  background: #1a1a2e;
  border-radius: var(--scarf-radius-lg);
  padding: var(--scarf-space-8);
  color: #fff;
}
.scarf-pattern-countdown__boxes {
  display: flex;
  justify-content: center;
  gap: var(--scarf-space-4);
  margin: var(--scarf-space-6) 0;
}
.scarf-pattern-countdown__box {
  display: flex;
  flex-direction: column;
  align-items: center;
  background: rgba(255,255,255,0.1);
  border-radius: var(--scarf-radius-md);
  padding: var(--scarf-space-4) var(--scarf-space-6);
  min-width: 80px;
}
.scarf-pattern-countdown__number {
  font-size: var(--scarf-font-2xl);
  font-weight: 700;
  line-height: 1;
}
.scarf-pattern-countdown__label {
  font-size: var(--scarf-font-xs);
  color: rgba(255,255,255,0.7);
  margin-top: var(--scarf-space-2);
}
@media (max-width: 480px) {
  .scarf-pattern-countdown__boxes { gap: var(--scarf-space-2); }
  .scarf-pattern-countdown__box { min-width: 60px; padding: var(--scarf-space-3); }
  .scarf-pattern-countdown__number { font-size: var(--scarf-font-xl); }
}
```

---

## New Categories to Register

| Category ID | Label (Persian) |
|---|---|
| `scarf-products` | محصولات |
| `scarf-content` | محتوا |

---

## File Changes Summary

### `inc/block-patterns.php`
- Add 2 new categories: `scarf-products`, `scarf-content`
- Add 13 new patterns (tasks 08-12)
- Total patterns after: 19 (6 existing + 13 new)
- All patterns use `esc_html__()`, `esc_attr__()`, `esc_url()` for escaping
- All text strings use `scarf` text domain
- All HTML is RTL-first with logical CSS properties

### `assets/css/main.css`
- Add ~120 lines of pattern-specific CSS
- Use existing design tokens (no new variables)
- Responsive breakpoints: 480px, 768px, 1024px
- No `!important` additions
- No external dependencies

### `assets/js/countdown-timer.js` (new)
- Vanilla JS countdown timer
- Reads `data-countdown-end` attribute
- Updates DOM every second
- Graceful fallback: hides timer, shows static text
- Enqueued conditionally via `wp_enqueue_script` in `scarf_register_patterns()`

### `functions.php`
- No changes needed (already requires block-patterns.php)

---

## Validation Checklist

- [ ] All 19 patterns appear in Gutenberg pattern browser
- [ ] All patterns render correctly in RTL mode
- [ ] All patterns responsive at 480px, 768px, 1024px
- [ ] All text strings translatable with `scarf` text domain
- [ ] All outputs escaped (esc_html, esc_attr, esc_url)
- [ ] No JavaScript errors
- [ ] Countdown timer works and falls back gracefully
- [ ] No horizontal overflow in any pattern
- [ ] No external dependencies (CDN, paid assets)
- [ ] No WordPress core/WooCommerce/plugin file modifications

---

## Implementation Order

1. **Task 08** — Hero & promotional banners (3 patterns)
2. **Task 09** — Product patterns (3 patterns)
3. **Task 10** — Category, CTA & about patterns (3 patterns)
4. **Task 11** — Testimonial & FAQ patterns (2 patterns)
5. **Task 12** — Sale banner & countdown (2 patterns + JS)

Each task should be implemented and validated before moving to the next.

---

## Notes

- All patterns are static HTML (no dynamic WordPress queries) — they are meant for manual content creation in Gutenberg
- The countdown timer is the only JS-powered feature; everything else is pure HTML/CSS
- Patterns follow the existing `scarf/` namespace convention
- Persian text is natural and shopping-oriented (per DESIGN_SYSTEM.md)
- Placeholder images use empty `src` attributes — users replace with WordPress media
- No WooCommerce dynamic blocks used — patterns are for static content pages
- The `scarf/trust-badges` pattern already exists and covers task-10's trust section needs
