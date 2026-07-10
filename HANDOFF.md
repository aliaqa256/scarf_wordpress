# HANDOFF.md — Scarf WordPress Theme Project

## Current Status

- The `scarf` theme exists and is WordPress-recognisable at `wp-content/themes/scarf/`.
- Theme is functionally bootstrapped: constants, supports (title-tag, post-thumbnails, WooCommerce, html5), primary menu location, and CSS/JS enqueuing active.
- Global CSS design tokens and RTL foundation are active in `assets/css/main.css`.
- Header is built with logo/site name, search (with Persian placeholder), account link, WooCommerce cart link with count badge, and primary navigation row with fallback. All user-facing strings are Persian and translatable.
- Mobile menu toggle works with vanilla JS: opens/closes on click and Escape key, uses `aria-expanded` / `aria-controls`, progressive enhancement with `no-js`/`js` class swap on `<html>`.
- Hero section and placeholder system are implemented (Stage 6).
- Homepage sections (categories, offers, new arrivals, best sellers, services) and front-page.php are implemented (Stage 7).
- WooCommerce product card styling via hooks + CSS is active (Stage 8).
- Shop archive has sidebar widget area, filter toggle (mobile drawer), custom breadcrumb/ordering/pagination styles, and archive layout flex wrapper (Stage 9).
- Single product page has custom sale badge, variation select styling, gallery/summary/tabs/related products CSS (Stage 10).
- Cart and checkout pages are fully styled (table, form, payment, empty state, notices) (Stage 11).
- Footer is minimal (close wrappers, wp_footer) — the 4-column footer was added in error and has been reverted per correction pass.

## Important Rules

- Theme name is `scarf`, path is `wp-content/themes/scarf/`.
- Custom plugins must start with `scart-`.
- RTL/Persian-first — the site sells scarves and shawls in Persian.
- Digikala is UX inspiration only; do not copy assets, exact UI, code, or brand identity.
- Do not manage Git unless the user explicitly asks.
- Use Playwright MCP for visual/browser validation when relevant.
- Prefer WooCommerce hooks before template overrides.
- All user-facing strings must be translatable with text domain `scarf`.
- Do not modify WordPress core, WooCommerce, or Ultimate Member plugin files.

## Completed Stages

### Stage 2 — Theme Bootstrap, Enqueue, Supports

Date: 2026-07-10

Summary:
- Expanded `functions.php` with constants (`SCARF_VERSION`, `SCARF_DIR`, `SCARF_URI`), `scarf_setup()` (textdomain, title-tag, post-thumbnails, WooCommerce, html5, primary menu), and `scarf_enqueue_assets()` (style.css, main.css, main.js).

Files changed:
- `wp-content/themes/scarf/functions.php`

Validation:
- Static: PHP syntax passed on all files.

### Stage 1 — Base Theme Scaffold

Date: 2026-07-10

Summary:
- Created theme directory with `style.css` (WordPress header), `index.php` (minimal loop wrapper), `functions.php` (ABSPATH guard only), `header.php` (document head + `#page` wrapper), `footer.php` (closing wrappers + wp_footer), `main.css` (empty), `main.js` (empty ready handler), and subdirectories (`assets/css/`, `assets/js/`, `assets/images/`, `inc/`, `template-parts/`).

Files changed:
- `wp-content/themes/scarf/style.css`
- `wp-content/themes/scarf/index.php`
- `wp-content/themes/scarf/functions.php`
- `wp-content/themes/scarf/header.php`
- `wp-content/themes/scarf/footer.php`
- `wp-content/themes/scarf/assets/css/main.css`
- `wp-content/themes/scarf/assets/js/main.js`

Validation:
- Static: directory structure verified, PHP syntax passed on all files.

### Stage 0 — Project Rules & Handoff Setup

Date: 2026-07-10

Summary:
- Created `HANDOFF.md` with current status, important rules, open tasks, and last session summary.

Files changed:
- `HANDOFF.md`

Validation:
- File exists, matches required structure.

### Stage 5 — Mobile Menu & Responsive Header Validation

Date: 2026-07-10

Summary:
- Updated `assets/js/main.js` with vanilla JS mobile menu toggle: `no-js` → `js` class swap on `<html>`, `aria-expanded`/`aria-controls` management, `.is-open` class on nav, `.scarf-menu-open` on body for scroll lock, Escape key to close, progressive enhancement (no error if toggle or nav missing).
- Added responsive header CSS to `main.css`: at 1024px and below — toggle visible, nav becomes absolute dropdown; at 768px — search wraps to full-width row, account/cart text smaller; at 480px — tighter spacing. No-JS fallback: nav always visible under `.no-js`.
- Playwright validation: desktop (1440×900), tablet (768×1024), mobile (390×844). No horizontal overflow at any viewport. Menu opens/closes correctly. Escape key closes menu. No console errors. Screenshots saved to `.opencode/playwright-screenshots/batch-2/`.
- No additional header.php changes needed (mobile toggle and `no-js` class were already added in Stage 4).

Files changed:
- `wp-content/themes/scarf/assets/js/main.js`
- `wp-content/themes/scarf/assets/css/main.css`

Validation:
- PHP syntax passed on header.php and functions.php.
- Playwright: menu open/close, Escape key, aria-expanded toggle, overflow check — all pass.
- No non-goal content added.

### Stage 4 — Header, Search, Cart, Account Navigation

Date: 2026-07-10

Summary:
- Rewrote `header.php` with full header: skip link, brand (custom logo or site name), search via `get_search_form()`, account link (safe page-slug fallback, no UM internal API calls), WooCommerce cart link (null-guarded cart count), and primary navigation with custom `scarf_fallback_menu()`.
- Created `searchform.php` with Persian placeholder "جست‌وجوی شال، روسری، رنگ یا طرح", screen-reader label, and hidden `post_type=product` input when WooCommerce is active.
- Added `scarf_get_account_url()` and `scarf_fallback_menu()` helper functions in `functions.php`.
- Added header CSS to `main.css`: sticky header, flex layout, search form styling (input height/radius/focus), account/cart links, cart count badge (pill-shaped, discount color), horizontal navigation, skip link, button reset, and mobile menu toggle placeholder (hidden on desktop).

Files changed:
- `wp-content/themes/scarf/header.php`
- `wp-content/themes/scarf/searchform.php`
- `wp-content/themes/scarf/functions.php`
- `wp-content/themes/scarf/assets/css/main.css`

Validation:
- Static: PHP syntax passed on all 3 PHP files.
- Manual review: no non-goal content (no homepage sections, product cards, footer, archive styling, cart/checkout styling, UM styling, AJAX, mega-menu, dropdown behavior).

### Stage 3 — Design Tokens & Global RTL Foundation

Date: 2026-07-10

Summary:
- Expanded `assets/css/main.css` with full design token system from DESIGN_SYSTEM.md: colors (primary, secondary, accent, success, warning, danger, text, border, background, surface, price, discount), typography (Vazirmatn/IRANSans font stack, xs through 2xl scale), spacing (1–12), radius (xs–pill), shadows (sm/md/lg), container (max-width 1440px, padding 1rem), input-height, and z-index tokens.
- Added base CSS reset (box-sizing, body defaults, img/svg/video max-width, a colors, button/input/select/textarea inherit, :focus-visible outline).
- Added utility classes: .screen-reader-text, .site (flex column min-height), .site-main, .scarf-container, .aligncenter/left/right, .wp-caption, .wp-caption-text.
- Used logical RTL-friendly properties (margin-inline, padding-inline, float inline-start/end).
- No component or header styles added.

Files changed:
- `wp-content/themes/scarf/assets/css/main.css`

Validation:
- Static review: all required token groups present, :focus-visible syntax correct, no PHP files changed, no component styles.

### Stage 11 — Cart, Checkout & Notices Styling

Date: 2026-07-10

Summary:
- Added cart/checkout/notices CSS to `woocommerce.css`:
  - Notices (info/message/error): colored left border, flex layout, responsive button.
  - Cart table: bordered card, thumbnail (60px), quantity input (hidden spinners), remove button (pill danger), coupon row.
  - Cart totals: table card, proceed-to-checkout primary button full-width.
  - Checkout form: max-width 800px, card-style form container, inputs/selects/textarea styled with design tokens, Select2 integration.
  - Review order table: styled to match cart table.
  - Payment section: bordered card, radio methods, payment box, place order button full-width primary.
  - Empty cart: centered text with `return-to-shop` primary button.
  - BlockUI overlay: light semi-transparent.
  - Responsive at 768px: smaller thumbnails, stacked coupon, 16px font on checkout inputs (iOS zoom prevention).
- Footer was initially rewritten with 4-column grid, but this was reverted in a correction pass (see Correction 1 below).

Files changed:
- `wp-content/themes/scarf/assets/css/woocommerce.css` (update — cart/checkout/notices CSS)

Validation:
- PHP brace counts balanced: `inc/woocommerce.php` (45 `{`, 45 `}`), `functions.php` (15 `{`, 15 `}`).
- JS syntax valid (`node -c` passed).
- No `woocommerce/` template override directory created.
- No JavaScript logic changes for cart/checkout (CSS only).
- Footer work was reverted — footer.php is now minimal safe footer, main.css footer CSS removed.

### Stage 10 — Single Product Page & Attribute UX

Date: 2026-07-10

Summary:
- Added `inc/woocommerce.php` hooks:
  - `scarf_woocommerce_single_product_wrapper_start()`: opens `<div class="scarf-single-product">` on `woocommerce_before_single_product` (priority 5).
  - `scarf_woocommerce_single_product_wrapper_end()`: closes wrapper on `woocommerce_after_single_product` (priority 5).
  - `scarf_woocommerce_single_sale_badge()`: replaces default `woocommerce_show_product_sale_flash` — shows percentage discount or generic `تخفیف ویژه` text for non-simple product types, with `.scarf-badge--single` class.
  - `scarf_woocommerce_variation_dropdown_class()`: adds `scarf-variation-select` class to variation attribute dropdowns via `woocommerce_dropdown_variation_attribute_options_html` filter.
- Added `assets/css/woocommerce.css` single product styles:
  - Gallery column: border, radius, flex thumbnail nav.
  - Summary: title, price (del/ins), short description, product meta.
  - Cart form: flex layout, quantity input (hidden spinner arrows), add-to-cart button.
  - Variations: stacked label + styled `.scarf-variation-select` pill dropdown with custom arrow, reset link.
  - Tabs: horizontal scrollable tab bar with active underline indicator, panel with soft text.
  - Related/upsells: section divider, heading, reuses products grid.
  - All sections responsive at 1024px, 768px (stack, full-width, smaller text).

Files changed:
- `wp-content/themes/scarf/inc/woocommerce.php` (update)
- `wp-content/themes/scarf/assets/css/woocommerce.css` (update)

Validation:
- PHP brace count balanced (45 `{`, 45 `}`).
- No `woocommerce/` template override directory created.
- No JS changes needed for Stage 10.

### Stage 9 — Shop Archive Layout, Filters & Sidebar

Date: 2026-07-10

Summary:
- Registered `sidebar-shop` widget area in `functions.php` via `widgets_init`.
- Created `inc/woocommerce.php` additions:
  - `scarf_woocommerce_archive_layout_start()`: opens `<div class="scarf-archive-layout"><div class="scarf-archive-content">` on `woocommerce_before_main_content` (priority 5).
  - `scarf_woocommerce_archive_layout_mid()`: closes `</div>` (archive-content) on `woocommerce_after_main_content` (priority 5).
  - `scarf_woocommerce_shop_sidebar()`: replaces default `woocommerce_get_sidebar`, outputs `<aside id="scarf-shop-filters">` with widget area or Persian empty-state message, closes `</div>` (archive-layout) after sidebar.
  - `scarf_woocommerce_filter_toggle()`: responsive filter toggle button with aria-controls/aria-expanded on `woocommerce_before_shop_loop` (priority 5).
- Updated `assets/js/main.js`: mobile filter drawer logic — toggle aria-expanded, .is-open on sidebar, .scarf-filter-open on body, Escape key to close.
- Updated `assets/css/woocommerce.css`:
  - `.scarf-archive-layout`: flex container, sidebar 280px, content flex 1.
  - `.scarf-shop-filters`: widget card styles, empty state.
  - Breadcrumb: inline flex, RTL-friendly separator.
  - Ordering: custom select arrow via CSS, consistent height.
  - Pagination: flex pill-style page numbers, active state.
  - Filter toggle: hidden on desktop, visible at mobile breakpoint.
  - Mobile: sidebar becomes fixed off-canvas drawer with backdrop overlay, toggle button visible.

Files changed:
- `wp-content/themes/scarf/functions.php` (update)
- `wp-content/themes/scarf/inc/woocommerce.php` (update)
- `wp-content/themes/scarf/assets/css/woocommerce.css` (update)
- `wp-content/themes/scarf/assets/js/main.js` (update)

Validation:
- PHP brace counts balanced (29 `{`, 29 `}` in woocommerce.php, 15 `{`, 15 `}` in functions.php).
- No `woocommerce/` template override directory created.
- JS syntax valid (node -c passed).
- All hooks guarded with `is_shop()` or `is_product_taxonomy()`.
- Sidebar fallback displays Persian translatable text when no widgets are active.
- No file was edited if it was not part of Stage 9 scope.

### Stage 8 — Product Card Component & WooCommerce Loop Styling

Date: 2026-07-10

Summary:
- Created `inc/woocommerce.php` with WooCommerce hooks/filters:
  - Replaced default sale flash with `scarf_woocommerce_sale_badge()`: calculates and shows percentage discount badge (e.g., `25%`), only for simple products with valid prices.
  - Added `scarf_woocommerce_stock_badge()`: outputs `ناموجد` badge on out-of-stock products (after title).
  - Filtered `woocommerce_loop_add_to_cart_link` to add theme button classes (`scarf-button`, `scarf-button--primary`, `scarf-product-card__button`) without removing WooCommerce's own classes.
- Updated `functions.php` to require `inc/woocommerce.php` and conditionally enqueue `assets/css/woocommerce.css` when WooCommerce is active.
- Created `assets/css/woocommerce.css` with product card styles:
  - CSS grid for product loop (4 cols desktop, 3 tablet, 2 mobile), no floats.
  - Product cards: white surface, border, border-radius-lg, overflow hidden, hover shadow.
  - Image: aspect-ratio 1:1, object-fit cover.
  - Title: line-clamp 2, font-sm.
  - Price: font-md, bold; del styled as muted.
  - `.scarf-badge` pill styles for discount (--discount red) and danger (--danger).
  - Badges positioned absolute on card (discount top-left, out-of-stock top-right).
  - Add-to-cart button styled with theme button tokens, full-width within card.
  - No `add_filter('woocommerce_enqueue_styles', '__return_empty_array')`.
  - No AJAX cart fragments. No template overrides.

Files changed:
- `wp-content/themes/scarf/inc/woocommerce.php` (new)
- `wp-content/themes/scarf/assets/css/woocommerce.css` (new)
- `wp-content/themes/scarf/functions.php` (update)

Validation:
- PHP syntax passed on inc/woocommerce.php and functions.php.
- No `woocommerce/` directory created — confirmed.
- No `__return_empty_array` for WooCommerce styles — confirmed.
- No AJAX cart fragments — confirmed.
- All hooks guarded with `class_exists('WooCommerce')`.
- Sale badge calculates percentage for simple products only, outputs valid HTML.

### Stage 7 — Homepage Sections: Categories, Offers, New Arrivals, Best Sellers

Date: 2026-07-10

Summary:
- Created `front-page.php` as homepage template calling all section template parts in order.
- Created `template-parts/section-categories.php`: static category grid with 5 Persian category cards (شال, روسری, شال مجلسی, روسری نخی, تخفیف‌دار), each linking to the WC shop page.
- Created `template-parts/section-offers.php`: queries discounted products (max 4), skips section entirely if none exist.
- Created `template-parts/section-new-arrivals.php`: queries latest 8 products, shows Persian empty state if none.
- Created `template-parts/section-best-sellers.php`: queries top 8 products by total_sales, shows empty state if none.
- Created `template-parts/section-services.php`: static trust row with 4 service cards (ارسال سریع, ضمانت بازگشت, پرداخت امن, پشتیبانی خرید).
- Added CSS for all section types: `.scarf-section`, `.scarf-section__heading/title/subtitle/link`, `.scarf-category-grid/card`, `.scarf-services/service-card`, `.scarf-empty-state`, `.scarf-product-grid`. Responsive at 1024px, 768px, 480px.
- All product sections guard with `class_exists('WooCommerce')`, use WP_Query, reset postdata, no database modifications.
- No WooCommerce template overrides. No `.woocommerce` styles.

Files changed:
- `wp-content/themes/scarf/front-page.php` (new)
- `wp-content/themes/scarf/template-parts/section-categories.php` (new)
- `wp-content/themes/scarf/template-parts/section-offers.php` (new)
- `wp-content/themes/scarf/template-parts/section-new-arrivals.php` (new)
- `wp-content/themes/scarf/template-parts/section-best-sellers.php` (new)
- `wp-content/themes/scarf/template-parts/section-services.php` (new)
- `wp-content/themes/scarf/assets/css/main.css` (update)

Validation:
- PHP syntax passed on all 7 PHP files.
- No `woocommerce/` directory created.
- No database content created/deleted/modified.
- No `.woocommerce` styles in main.css.
- All product queries safe, guarded, and limited.

### Stage 6 — Hero, Campaign Blocks & Image Placeholder System

Date: 2026-07-10

Summary:
- Created `inc/template-helpers.php` with two helper functions:
  - `scarf_placeholder_image( $context, $args )`: returns inline SVG placeholder with soft fashion gradient, centered Persian text, no external resources. Supports `product`, `hero`, `category` contexts.
  - `scarf_section_heading( $title, $args )`: returns reusable section heading with title, optional subtitle, optional link.
- Updated `functions.php` to `require_once SCARF_DIR . '/inc/template-helpers.php'`.
- Created `template-parts/hero-section.php`: image-first hero section with CSS gradient background, placeholder SVG, Persian headline `جدیدترین شال و روسری‌ها`, description, CTA linking to WC shop page.
- Added hero and button styles to `main.css`: `.scarf-button`, `.scarf-button--primary`, `.scarf-hero`, `.scarf-hero__bg`, `.scarf-hero__overlay`, `.scarf-hero__content`, `.scarf-hero__title`, `.scarf-hero__description`. RTL-friendly, responsive at 768px and 480px.
- No `front-page.php` created. No external image URLs. No template overrides.

Files changed:
- `wp-content/themes/scarf/inc/template-helpers.php` (new)
- `wp-content/themes/scarf/functions.php` (update)
- `wp-content/themes/scarf/template-parts/hero-section.php` (new)
- `wp-content/themes/scarf/assets/css/main.css` (update)

Validation:
- PHP syntax passed on all 3 PHP files.
- No `front-page.php` created — confirmed.
- No external image URLs — confirmed.
- Hero section has Persian translatable text, links to shop page if WC active.
- Placeholder SVG is generated inline, uses soft gradient, no external resources.

## Corrections

### Correction 1 — Remove out-of-scope footer UI (Batch 4)

Date: 2026-07-10

Summary:
- Footer UI (4-column grid with brand, quick links, contact, social, copyright) was added during Batch 4 Stage 11 but was out of scope.
- Reverted `footer.php` to minimal safe footer: close `#page`, `wp_footer()`, close `body`/`html`.
- Removed all footer CSS from `assets/css/main.css` (`.scarf-footer` block — ~114 lines).
- No other files were affected — no PHP or JS files referenced footer classes besides footer.php itself.

Files changed:
- `wp-content/themes/scarf/footer.php` (reverted)
- `wp-content/themes/scarf/assets/css/main.css` (footer CSS removed)

Validation:
- Brace counts unchanged in all PHP files.
- No runtime impact — footer is now a minimal structural close, same as pre-Batch-4 state.

### Correction 2 — Browser validation results

Date: 2026-07-10

**Desktop (1440×900):**
- Shop page: ✅ No overflow, breadcrumb visible, sorting dropdown with 6 Persian options, product card with discount badge and price, filter sidebar with empty state, header/search/cart all functional.
- Checkout page: ✅ No overflow, full Persian checkout form (contact info, billing address, state selector, city, postal code, phone), order summary with product, place order button.
- Homepage: ✅ No overflow, hero section, category grid, product sections all render.

**Tablet (768×1024):**
- Shop page: ✅ No overflow, filter toggle button visible, clicking opens filter drawer (`.is-open`, `aria-expanded="true"`, body class `scarf-filter-open`), Escape closes drawer.
- Mobile menu toggle: ✅ Opens/closes correctly, `aria-expanded` toggles.

**Mobile (390×844):**
- Shop page: ✅ No overflow, filter toggle opens/closes correctly.
- Single product page: ✅ No overflow, product info renders.
- Cart page (empty): ✅ Shows "Your cart is currently empty!" + "New in store" section.
- Cart page (with item): ✅ Cart table with product image, title, price, quantity controls, remove button, coupon toggle, totals, checkout link. Header shows cart count badge "1".
- Checkout page: ✅ No overflow, full form renders with Persian labels.

**Console errors:**
- No errors from theme code. All errors are `s.w.org` emoji SVGs failing to load (network unavailable — expected in offline dev environment).

**Screenshots saved to:** `.opencode/playwright-screenshots/batch-4/`

## Current Open Tasks

- Stage 12 — (pending user request — placeholder for next batch).

## Architecture Decisions

- **Batch 3: No WooCommerce template overrides.** All product card customization done via hooks (sale badge, stock badge, add-to-cart link filter) and CSS. No `woocommerce/` directory created. This keeps full compatibility with WooCommerce updates. If future layout limitations appear (e.g., card element reordering impossible with CSS alone), they will be documented before adding any override.
- **Batch 3: Placeholder system.** Inline SVG generated by PHP helper `scarf_placeholder_image()`. No external images, no CDN, no CSS-only hacks. Easy to replace with WordPress attachment images later.
- **Batch 3: Homepage via `front-page.php` + template parts.** No Customizer settings. Sections are hardcoded, easily modifiable.

- **Batch 4: No WooCommerce template overrides for cart/checkout.** All cart, checkout, notice, and single-product styling done via CSS only. This keeps full WooCommerce compatibility and avoids complex template maintenance. If future requirements need structural changes (e.g., checkout field reordering), they will be done via filters or as a last resort via overrides.
- **Batch 4: Variation attributes styled as pill dropdowns.** The `woocommerce_dropdown_variation_attribute_options_html` filter adds a CSS class; actual pill appearance is done via CSS (appearance:none + custom arrow). True color/image swatches would require a plugin or JS-heavy approach and are deferred.

- **Account link**: Use `get_page_by_path()` with fallback chain instead of Ultimate Member internal APIs. Clean, testable, no UM dependency. (Architect-validated.)
- **Cart link**: Guard all WooCommerce calls with `class_exists('WooCommerce')` and `function_exists('WC')`. Always null-check `WC()->cart` before calling methods. (Architect-validated.)
- **Search form**: Custom `searchform.php` via `get_search_form()` is the correct WordPress pattern. Add screen-reader label for accessibility. WooCommerce hidden field only when WC is active. (Architect-validated.)
- **Fallback menu**: Custom `scarf_fallback_menu()` callback is preferred over `wp_page_menu()`. Gives full control over markup and RTL classes. (Architect-validated.)
- **functions.php**: Minimal additions justified — helper functions for account URL and fallback menu keep templates clean. No AJAX cart fragments in this batch.

## Known Issues / Risks

*(None yet.)*

## Useful Local Commands

```bash
wp theme list
wp plugin list
wp theme activate scarf
```

## Last Session Summary

**What was requested:** Batch 4 — Stages 9, 10, 11 (Shop Archive Layout/Filters, Single Product + Attribute UX, Cart/Checkout/Styling).

**What changed:**
- Stage 9: `functions.php` — registered `sidebar-shop` widget area. `inc/woocommerce.php` — archive layout hooks, sidebar, filter toggle. `woocommerce.css` — archive styles. `main.js` — filter drawer toggle.
- Stage 10: `inc/woocommerce.php` — single product wrapper, sale badge, variation select class. `woocommerce.css` — single product styles.
- Stage 11: `woocommerce.css` — cart table, checkout form, payment section, notices, empty cart.
- Correction 1: Removed out-of-scope footer UI. Reverted `footer.php` to minimal. Removed footer CSS from `main.css`.
- Correction 2: Playwright validation — all pages pass at 1440×900, 768×1024, 390×844. No overflow, filter toggle works, mobile menu works, cart/checkout render correctly. No theme console errors.

**What should happen next:** Stage 12 (pending user request).
