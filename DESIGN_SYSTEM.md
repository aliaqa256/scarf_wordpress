# DESIGN_SYSTEM.md — Scarf Persian E-commerce Design System

## Purpose

This file defines the design system for the `scarf` WordPress/WooCommerce theme.

The website must be:

* Persian-first
* RTL-first
* WooCommerce-ready
* Mobile-friendly
* Clean, trustworthy, and suitable for selling scarves and shawls
* Inspired by modern Iranian e-commerce UX patterns, especially Digikala-like shopping flows

Important:

Do not copy Digikala assets, logo, icons, exact UI, exact colors, proprietary components, texts, layouts, or code.

Use Digikala only as UX inspiration for:

* Persian e-commerce structure
* Product discovery patterns
* Dense product cards
* Filter/sidebar behavior
* Discount and price hierarchy
* Trust-building service sections
* RTL shopping experience

This theme must have its own identity for a scarf and shawl store.

---

## Brand Direction

The brand should feel:

* Feminine but not childish
* Elegant but still commercial
* Trustworthy and clear
* Warm, fashion-oriented, and Persian
* Simple enough for fast shopping
* Suitable for both daily scarves and premium shawls

The design should not feel like a generic tech store.

It should feel like a Persian fashion shop with strong e-commerce usability.

---

## Language and Content Rule

All custom UI text must be Persian.

The site should use natural Persian shopping language.

Examples:

* جست‌وجوی شال و روسری
* دسته‌بندی‌ها
* شال
* روسری
* محصولات جدید
* پرفروش‌ترین‌ها
* پیشنهاد ویژه
* مشاهده محصول
* افزودن به سبد خرید
* موجود در انبار
* ناموجود
* انتخاب رنگ
* انتخاب طرح
* راهنمای خرید
* راهنمای نگهداری
* ارسال و بازگشت کالا

Avoid English UI labels unless they are unavoidable technical/plugin strings.

All user-facing strings in PHP must still be translatable using the `scarf` text domain.

---

## Visual Identity

### Main Personality

The visual language should combine:

* Clean e-commerce layout
* Soft fashion-store feeling
* High readability
* Strong product focus
* Clear discount/price presentation

### General Style

Use:

* White and soft neutral backgrounds
* Clear product cards
* Subtle borders
* Rounded corners
* Light shadows only where useful
* Strong primary CTA color
* Clear discount badges
* Soft accent colors for fashion categories

Avoid:

* Heavy gradients
* Dark, aggressive UI
* Overly decorative elements
* Too many colors
* Busy backgrounds
* Copying Digikala’s exact branding

---

## Color System

Use CSS custom properties.
Note: These CSS variables will be dynamic and customizable by the designer via the native WordPress Customizer.

Recommended starting palette:

```css
:root {
  --scarf-color-primary: #d83f5f;
  --scarf-color-primary-hover: #c93452;
  --scarf-color-primary-soft: #fff1f4;

  --scarf-color-secondary: #19bfd3;
  --scarf-color-secondary-soft: #e9fbfd;

  --scarf-color-accent: #b76e79;
  --scarf-color-accent-soft: #f9eef0;

  --scarf-color-success: #0f9f6e;
  --scarf-color-warning: #f59e0b;
  --scarf-color-danger: #d32f2f;

  --scarf-color-text: #232933;
  --scarf-color-text-soft: #5f6773;
  --scarf-color-muted: #8a929f;

  --scarf-color-border: #e6e8ec;
  --scarf-color-border-strong: #d4d8df;

  --scarf-color-background: #f6f7f9;
  --scarf-color-surface: #ffffff;
  --scarf-color-surface-soft: #fafafa;

  --scarf-color-price: #232933;
  --scarf-color-discount: #d83f5f;
}
```

Color usage:

* Primary: main buttons, important badges, active states
* Secondary: small highlights, delivery/service hints, info badges
* Accent: fashion-related highlights
* Success: available stock, successful notices
* Warning: low stock, limited offer
* Danger: errors, unavailable states
* Neutral colors: text, borders, surfaces, backgrounds

Do not use Digikala’s exact brand palette as the project identity.

---

## Typography

The site is Persian-first, so typography must support Persian readability.

Recommended font stack:

```css
:root {
  --scarf-font-family: Vazirmatn, IRANSans, Tahoma, Arial, sans-serif;
}
```

If no local Persian font exists, fall back safely to system fonts.

Do not load external fonts from CDN unless the user explicitly approves.

### Font Scale

```css
:root {
  --scarf-font-xs: 0.75rem;
  --scarf-font-sm: 0.8125rem;
  --scarf-font-md: 0.875rem;
  --scarf-font-base: 1rem;
  --scarf-font-lg: 1.125rem;
  --scarf-font-xl: 1.375rem;
  --scarf-font-2xl: 1.75rem;
}
```

Usage:

* Product card title: `--scarf-font-sm` or `--scarf-font-md`
* Product price: `--scarf-font-md` or `--scarf-font-base`
* Section title: `--scarf-font-lg`
* Page title: `--scarf-font-xl`
* Hero title: `--scarf-font-2xl`

---

## Spacing System

Use consistent spacing tokens.

```css
:root {
  --scarf-space-1: 0.25rem;
  --scarf-space-2: 0.5rem;
  --scarf-space-3: 0.75rem;
  --scarf-space-4: 1rem;
  --scarf-space-5: 1.25rem;
  --scarf-space-6: 1.5rem;
  --scarf-space-8: 2rem;
  --scarf-space-10: 2.5rem;
  --scarf-space-12: 3rem;
}
```

General rules:

* Product card internal spacing should be compact.
* Page sections should have generous vertical spacing.
* Mobile spacing should be smaller but not cramped.
* Product grids should remain readable on small screens.

---

## Radius and Border System

```css
:root {
  --scarf-radius-xs: 0.25rem;
  --scarf-radius-sm: 0.5rem;
  --scarf-radius-md: 0.75rem;
  --scarf-radius-lg: 1rem;
  --scarf-radius-xl: 1.25rem;
  --scarf-radius-pill: 999px;
}
```

Usage:

* Buttons: `--scarf-radius-md`
* Product cards: `--scarf-radius-lg`
* Badges: `--scarf-radius-pill`
* Search box: `--scarf-radius-lg`
* Filter chips: `--scarf-radius-pill`

---

## Shadow System

Keep shadows subtle.

```css
:root {
  --scarf-shadow-sm: 0 1px 2px rgba(15, 23, 42, 0.06);
  --scarf-shadow-md: 0 8px 20px rgba(15, 23, 42, 0.08);
  --scarf-shadow-lg: 0 16px 32px rgba(15, 23, 42, 0.10);
}
```

Rules:

* Product cards should mostly rely on borders.
* Use shadow on hover only if it improves clarity.
* Avoid heavy floating-card effects.

---

## Layout System

### Container

```css
:root {
  --scarf-container-max: 1440px;
  --scarf-container-padding: 1rem;
}
```

General page structure:

* Full-width background
* Centered content container
* RTL layout
* Header fixed or sticky only if it does not hurt mobile UX
* Product archive with sidebar filters on desktop
* Bottom/mobile filter drawer on mobile when implemented

### Breakpoints

```css
:root {
  --scarf-breakpoint-sm: 480px;
  --scarf-breakpoint-md: 768px;
  --scarf-breakpoint-lg: 1024px;
  --scarf-breakpoint-xl: 1280px;
}
```

Recommended behavior:

* Mobile: 2-column product grid when space allows
* Tablet: 3-column product grid
* Desktop: 4 or 5-column product grid depending on sidebar
* Large desktop: max-width container, not unlimited stretching

---

## Header System

The header should support Persian e-commerce shopping behavior.

Recommended desktop header:

1. Top utility area if needed
2. Main header row:

   * Logo/site name
   * Large search input
   * Account/user area
   * Cart button
3. Navigation/category row:

   * Product categories
   * Special offers
   * Buying guide
   * Contact/about links

Recommended mobile header:

1. Compact logo/site name
2. Search input as a prominent row
3. Cart/account buttons
4. Mobile menu button
5. Category drawer or menu

Search placeholder examples:

* جست‌وجوی شال، روسری، رنگ، طرح یا جنس
* دنبال چه شال یا روسری‌ای می‌گردید؟

Header rules:

* Search must be highly visible.
* Cart must be easy to find.
* Account/login must be clear.
* Mobile header must not overflow horizontally.
* Use sticky header only after testing with Playwright.

---

## Navigation and Category UX

Main categories for this store:

* شال
* روسری
* شال مجلسی
* روسری نخی
* روسری ابریشم
* شال زمستانی
* شال ساده
* طرح‌دار
* جدیدترین‌ها
* پرفروش‌ترین‌ها
* تخفیف‌دارها

Navigation should be:

* Simple
* Persian
* RTL
* Easy to scan
* Not overloaded

Use category chips or horizontal scroll on mobile if needed.

---

## Homepage Content Model

The homepage should be content-rich but not chaotic.

Recommended homepage sections:

1. Hero / Main Campaign

   * Seasonal scarf/shawl offer
   * Clear CTA
   * Persian headline

2. Quick Categories

   * شال
   * روسری
   * مجلسی
   * روزمره
   * نخی
   * ابریشم
   * زمستانی
   * تخفیف‌دار

3. Special Offers

   * Discounted products
   * Countdown only if real
   * Avoid fake urgency

4. New Arrivals

   * Latest scarves and shawls

5. Best Sellers

   * Popular products

6. Shop by Color

   * مشکی
   * سفید
   * کرم
   * صورتی
   * آبی
   * سبز
   * قهوه‌ای
   * چندرنگ

7. Shop by Material

   * نخی
   * ابریشم
   * حریر
   * پشمی
   * ساتن
   * کشمیر

8. Trust / Services Row

   * ارسال سریع
   * ضمانت بازگشت
   * پرداخت امن
   * پشتیبانی
   * تضمین کیفیت

9. Buying Guide / Blog

   * راهنمای انتخاب روسری مناسب فرم صورت
   * تفاوت شال نخی و حریر
   * روش نگهداری از روسری ابریشم

---

## Product Card System

Product cards are one of the most important parts of the theme.

Each product card should support:

* Product image
* Product title
* Price
* Sale price
* Discount badge
* Stock state
* Rating if WooCommerce rating exists
* Quick add-to-cart where appropriate
* Color swatches if available
* Short product meta such as material or size if available

Recommended card hierarchy:

1. Image
2. Badges
3. Title
4. Small meta
5. Rating or trust hint
6. Price area
7. Add-to-cart CTA

Product card text examples:

* روسری نخی طرح‌دار زنانه
* شال حریر مجلسی
* روسری ابریشم سبک
* مناسب استفاده روزمره
* مناسب مهمانی
* فقط چند عدد باقی مانده

Rules:

* Product image must remain dominant.
* Price must be easy to scan.
* Discount badge must be visually clear.
* Do not show too much text.
* Cards should be compact but not cramped.
* Product title should use line clamp if needed.

---

## Price and Discount Pattern

Use strong visual hierarchy.

Elements:

* Current price: strong and dark
* Original price: muted and struck through
* Discount percent: primary/danger badge
* Currency: تومان, small but readable

Example structure:

```html
<div class="scarf-price">
  <span class="scarf-price__discount">۲۵٪</span>
  <del class="scarf-price__old">۸۰۰,۰۰۰</del>
  <ins class="scarf-price__current">۶۰۰,۰۰۰ تومان</ins>
</div>
```

Rules:

* Never fake discount values.
* Never show fake countdown timers.
* If WooCommerce sale price exists, use real data.
* If no sale exists, do not display discount badge.

---

## Badge System

Badge types:

* تخفیف
* جدید
* پرفروش
* موجود
* ناموجود
* ارسال سریع
* تعداد محدود
* پیشنهاد ویژه

Recommended classes:

```css
.scarf-badge
.scarf-badge--discount
.scarf-badge--new
.scarf-badge--success
.scarf-badge--warning
.scarf-badge--danger
.scarf-badge--info
```

Rules:

* Badges must be short.
* Use Persian labels.
* Do not use too many badges on one card.
* Discount badge has priority over other marketing badges.

---

## Archive / Shop Page System

The WooCommerce shop/archive page should be optimized for discovery.

Desktop layout:

* Right sidebar filters
* Main product grid
* Top sorting row
* Result count
* Active filters
* Optional category description

Mobile layout:

* Product grid first
* Filter button
* Sort button
* Filter drawer or collapsible panel

Filters suitable for scarf/shawl store:

* دسته‌بندی
* قیمت
* رنگ
* جنس
* طرح
* مناسب برای
* فصل
* قواره / اندازه
* موجودی
* تخفیف‌دارها

Sort options:

* جدیدترین
* پرفروش‌ترین
* ارزان‌ترین
* گران‌ترین
* بیشترین تخفیف
* محبوب‌ترین

Rules:

* Filters must be Persian.
* Filter UI must be touch-friendly.
* Mobile filter drawer must be easy to close.
* Active filters must be visible.
* Do not hide product grid under too many controls.

---

## Product Detail Page System

Product page structure:

1. Breadcrumb
2. Product gallery
3. Product title
4. Rating/reviews if available
5. Product attributes
6. Color/design selection
7. Price
8. Add-to-cart section
9. Shipping/return/trust notes
10. Product description
11. Specifications
12. Care guide
13. Related products

Important scarf/shawl attributes:

* جنس
* قواره
* رنگ
* طرح
* مناسب فصل
* مناسب برای
* نحوه شست‌وشو
* کشور/محل تولید if available
* سبک استفاده: روزمره، مجلسی، رسمی

Product page Persian content examples:

* راهنمای انتخاب
* مشخصات محصول
* روش نگهداری
* ارسال و بازگشت کالا
* محصولات مشابه

Rules:

* Add-to-cart must be prominent.
* Product image gallery must be clean.
* Attribute display must be scannable.
* Do not bury price or CTA.
* Use WooCommerce data, not fake hardcoded product info.

---

## Cart and Checkout UX

Cart page should be:

* Clean
* Trustworthy
* Easy to review
* Persian
* Minimal distractions

Checkout page should prioritize:

* Clear fields
* Persian labels
* Order summary
* Shipping method
* Payment method
* Final confirmation

Rules:

* Do not over-style WooCommerce checkout in a way that breaks plugins.
* Keep validation messages visible.
* Keep WooCommerce notices readable.
* Avoid multi-step checkout unless explicitly requested.

---

## Ultimate Member Pages

Ultimate Member is installed and Persian pages have been created.

The theme should visually support these account pages:

* Login
* Register
* Account
* Profile
* Password reset

Rules:

* Style Ultimate Member pages to match the theme.
* Do not edit Ultimate Member plugin files.
* Use theme CSS overrides carefully.
* Keep forms readable and mobile-friendly.
* Persian labels and messages should remain clear.
* Account pages should feel part of the store, not a separate plugin.

---

## Trust and Service Content

The site should include trust-building service blocks.

Recommended Persian service labels:

* ارسال سریع سفارش‌ها
* پرداخت امن
* ضمانت بازگشت کالا
* پشتیبانی خرید
* تضمین کیفیت محصول
* بسته‌بندی مناسب هدیه

Rules:

* Do not claim services that the real business cannot provide.
* If a service is not active yet, use neutral text.
* Avoid fake claims such as “ارسال ۲ ساعته” unless actually true.

---

## Footer System

Footer should include:

* Support/contact info
* Buying guide links
* Customer service links
* Important store pages
* Social links if available
* Newsletter/email signup if needed
* Trust/service summary
* Short store description

Recommended footer groups:

* راهنمای خرید
* خدمات مشتریان
* درباره فروشگاه
* ارتباط با ما
* دسته‌بندی‌های محبوب

Footer text must be Persian.

Do not copy Digikala footer text.

---

## Content Tone

Use a warm, clear, commercial Persian tone.

Good tone:

* ساده
* محترمانه
* مطمئن
* راهنما
* فروشگاهی

Avoid:

* اغراق شدید
* وعده‌های غیرواقعی
* متن‌های خیلی رسمی و خشک
* متن‌های انگلیسی بی‌دلیل

Examples:

* «برای استایل روزمره، شال‌های سبک و خوش‌رنگ را ببینید.»
* «روسری‌های مناسب مهمانی با طرح‌های خاص و پارچه لطیف.»
* «قبل از خرید، جنس، قواره و روش شست‌وشو را بررسی کنید.»

---

## Icon and Image Rules

Do not use Digikala icons or assets.

Use:

* Original icons
* Free licensed icons only if approved
* Inline SVG created specifically for this theme
* WordPress media images
* Product photos uploaded by store owner

Product images should be:

* Clean
* Consistent aspect ratio
* Fashion-oriented
* Focused on scarf/shawl texture, color, and styling

Recommended aspect ratio:

* Product card: 1:1 or 4:5
* Hero banners: wide responsive
* Category cards: 1:1 or 4:3

---

## Component List

Core components to build over stages:

* Site header
* Hero Section (Gutenberg Block / Pattern - customizable by designer)
* Dynamic Categories Section (Gutenberg Block / Pattern)
* Search box
* Category navigation
* Mobile menu
* Product card
* Price block
* Discount badge
* Category card
* Section heading
* Product carousel/rail if needed
* Service/trust item
* Filter sidebar
* Mobile filter drawer
* Sort bar
* Empty state
* WooCommerce notice
* Add-to-cart button
* Quantity input
* Footer
* Ultimate Member form wrapper

---

## Button System

Button variants:

```css
.scarf-button
.scarf-button--primary
.scarf-button--secondary
.scarf-button--ghost
.scarf-button--danger
.scarf-button--block
```

Rules:

* Primary button for purchase actions.
* Secondary button for lower-priority actions.
* Ghost button for navigation/filter actions.
* Button text must be Persian.
* Buttons must have visible focus states.
* Use `<button>` for actions and `<a>` for navigation.

---

## Form System

Forms should be:

* Clear
* Persian
* Mobile-friendly
* Accessible

Fields:

* Labels must be visible.
* Error messages must be readable.
* Required fields must be clear.
* Inputs should have enough height for touch.

Recommended input height:

```css
--scarf-input-height: 44px;
```

Search input should be larger and more prominent than normal fields.

---

## Accessibility Rules

Minimum accessibility requirements:

* Visible focus states
* Real buttons for actions
* Real links for navigation
* Proper labels for forms
* Meaningful alt text for images when possible
* Good color contrast
* No hover-only critical interactions
* Mobile controls must be touch-friendly

---

## RTL Rules

The design is RTL-first.

Use logical CSS properties where possible:

```css
margin-inline-start
margin-inline-end
padding-inline-start
padding-inline-end
inset-inline-start
inset-inline-end
border-inline-start
border-inline-end
```

Avoid unnecessary left/right hardcoding.

If left/right is used, verify RTL behavior with Playwright.

---

## Responsive Rules

Mobile is a primary target.

Required validation viewports:

* 390x844 mobile
* 768x1024 tablet
* 1440x900 desktop

Must check:

* Header
* Search
* Product grid
* Product card
* Archive filters
* Product page
* Cart
* Checkout
* Ultimate Member pages

No horizontal overflow is allowed.

---

## Performance Rules

Keep the theme lightweight.

Do not add:

* Heavy sliders
* Large JS frameworks
* CDN dependencies
* Unnecessary animations
* Large icon libraries
* Build tools unless explicitly requested

Prefer:

* Native CSS
* Vanilla JS
* WordPress enqueue
* Conditional asset loading
* Lazy-loaded images
* Minimal WooCommerce overrides

---

## WooCommerce Integration Rules

Use WooCommerce hooks and filters before template overrides.

Template overrides are allowed only when necessary.

If a WooCommerce template override is added:

* Explain why
* Keep it minimal
* Record it in `HANDOFF.md`
* Mention compatibility risk
* Validate with Playwright if visual

Do not edit WooCommerce plugin files.

---

## Legal / Originality Rules

This project may be inspired by Digikala’s public UX patterns, but must not copy:

* Logo
* Brand name
* Brand colors as exact identity
* Proprietary assets
* Exact component visuals
* Exact page layouts
* Exact text/copy
* Code
* Images
* Icons

The final result must be an original scarf/shawl store theme.

---

## Validation Checklist

Before marking a UI stage complete, check:

* Persian UI text
* RTL layout
* Mobile responsiveness
* Product grid readability
* Header/search usability
* WooCommerce notices
* Cart/account visibility
* Product card price hierarchy
* No obvious horizontal overflow
* No copied Digikala assets
* `HANDOFF.md` updated

Use Playwright MCP when visual/browser behavior is relevant.



## Brand Imagery and Placeholder Rule

The final storefront design must use real brand/store imagery where appropriate.

Important visual areas should be designed with image support from the beginning, especially:

- Homepage hero/banner
- Seasonal campaign sections
- Category cards
- Product collections
- Brand/story sections
- Shop by color/material sections
- Promotional blocks
- Empty states where useful

Because real store photos may not be available during development, every image-based component must support a suitable placeholder state.

Development placeholder rules:

- Use clean local placeholders, not external image URLs.
- Placeholders must match the intended image ratio and layout.
- Placeholders should feel appropriate for a scarf and shawl fashion store.
- Placeholder text must be Persian.
- Placeholder design can use soft gradients, abstract fabric shapes, pattern-like backgrounds, or simple inline SVG.
- Do not use random unrelated placeholder services.
- Do not hotlink images from Digikala or any other website.
- Do not use copyrighted brand/product images without permission.

Recommended placeholder examples:

- Hero placeholder text: «تصویر کمپین شال و روسری»
- Category placeholder text: «تصویر دسته‌بندی»
- Product placeholder text: «تصویر محصول»
- Collection placeholder text: «تصویر کالکشن»

Implementation rules:

- Image components must be easy to replace later with real uploaded WordPress media.
- Use WordPress image functions when real media exists.
- Use local theme fallback placeholders when media is missing.
- Product cards should use WooCommerce product images when available.
- If a product has no image, show a scarf-themed placeholder instead of a broken or generic image.
- Hero and campaign sections must be designed image-first, even during development.