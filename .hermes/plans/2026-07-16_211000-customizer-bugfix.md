# Scarf Theme — Bug Fixes + WordPress Customizer Implementation Plan

> **For Hermes:** Use subagent-driven-development skill to implement this plan task-by-task.

**Goal:** Fix 2 known bugs and add WordPress Customizer sections so the theme colors, typography, header, footer, hero, and contact info can be edited from Appearance → Customize.

**Architecture:** 
- Bug fixes are small, isolated changes in existing files.
- Customizer is added via a new `inc/customizer.php` file that registers sections/settings/controls and outputs inline CSS.
- No plugins — everything lives in the `scarf` theme.
- All Customizer values are applied via `wp_add_inline_style()` to override the CSS custom properties in `main.css`.

**Tech Stack:** PHP, WordPress Customizer API, CSS Custom Properties, WooCommerce AJAX fragments

---

## Phase A: Bug Fixes

### Task 1: Fix shop page container spacing

**Objective:** Add padding to the shop page container so content doesn't touch screen edges.

**Files:**
- Modify: `wp-content/themes/scarf/assets/css/woocommerce.css`

**Step 1: Inspect current shop archive CSS**

The issue is in `.scarf-archive-layout` or `.scarf-archive-content` — the container needs `padding-inline` or the outer wrapper needs adjustment.

**Step 2: Add container padding**

In `assets/css/woocommerce.css`, find the `.scarf-archive-layout` rule and ensure it has proper padding:

```css
.scarf-archive-layout {
    display: flex;
    gap: var(--scarf-space-6);
    padding-inline: var(--scarf-container-padding);
    max-width: var(--scarf-container-max);
    margin-inline: auto;
}
```

**Step 3: Verify**

- Run: `curl -s http://localhost/shop/ | grep -c 'scarf-archive-layout'`
- Expected: `1` (class exists)
- Visual: Screenshot with `google-chrome --headless` at 1440×900 and 390×844

---

### Task 2: Add WooCommerce AJAX cart fragments

**Objective:** Make the cart count badge in the header update without page refresh when items are added/removed.

**Files:**
- Modify: `wp-content/themes/scarf/functions.php`
- Modify: `wp-content/themes/scarf/assets/js/main.js`

**Step 1: Add cart fragment support in functions.php**

Add this function and hook in `functions.php`:

```php
function scarf_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="scarf-header__cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
    <?php
    $fragments['.scarf-header__cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'scarf_cart_fragment' );
```

Also need to make sure the cart count span always renders (even when 0) so AJAX can replace it. In `header.php`, change the cart count section to always show the span:

```php
<span class="scarf-header__cart-count"><?php echo esc_html( $cart_count ); ?></span>
```

(Remove the `if ( $cart_count > 0 ) :` condition.)

**Step 2: Verify AJAX is enabled**

WooCommerce enables AJAX cart by default via `wc_cart_fragments`. Verify it's not disabled. Check `functions.php` does NOT contain:
```php
add_filter( 'woocommerce_add_to_cart_fragments', '__return_empty_array' );
```

**Step 3: Verify**

- Add a product to cart via curl or browser
- Check that `.scarf-header__cart-count` updates without page refresh
- Run: `grep -n 'cart_fragment\|cart_fragments\|wc_cart_fragments' wp-content/themes/scarf/functions.php`
- Expected: the new filter hook is present

---

## Phase B: WordPress Customizer

### Task 3: Create inc/customizer.php skeleton

**Objective:** Create the Customizer file with basic structure and require it from functions.php.

**Files:**
- Create: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/functions.php`

**Step 1: Create inc/customizer.php**

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Scarf Theme Customizer settings.
 *
 * @package Scarf
 */

function scarf_customize_register( $wp_customize ) {

    // --- Panels ---

    $wp_customize->add_panel( 'scarf_panel', array(
        'title'    => esc_html__( 'تنظیمات قالب شال', 'scarf' ),
        'priority' => 30,
    ) );

    // --- Section: Colors ---
    // (Task 4)

    // --- Section: Typography ---
    // (Task 5)

    // --- Section: Header ---
    // (Task 6)

    // --- Section: Footer ---
    // (Task 7)

    // --- Section: Hero ---
    // (Task 8)

    // --- Section: Contact Info ---
    // (Task 9)
}
add_action( 'customize_register', 'scarf_customize_register' );

/**
 * Output inline CSS from Customizer values.
 */
function scarf_customizer_css() {
    $primary = get_theme_mod( 'scarf_color_primary', '#d83f5f' );
    // ... more colors and settings will be added in subsequent tasks

    $css = ':root {';
    $css .= '--scarf-color-primary: ' . esc_attr( $primary ) . ';';
    $css .= '}';
    // ... more CSS will be added

    wp_add_inline_style( 'scarf-main', $css );
}
add_action( 'wp_enqueue_scripts', 'scarf_customizer_css' );
```

**Step 2: Require from functions.php**

Add this line after the other `require_once` statements in `functions.php`:

```php
require_once SCARF_DIR . '/inc/customizer.php';
```

**Step 3: Verify**

- Run: `php -l wp-content/themes/scarf/inc/customizer.php` → Expected: No syntax errors
- Run: `php -l wp-content/themes/scarf/functions.php` → Expected: No syntax errors
- Visit: `http://localhost/wp-admin/customize.php` → Expected: "تنظیمات قالب شال" panel visible

---

### Task 4: Add Color settings to Customizer

**Objective:** Register all theme colors as Customizer controls with live preview.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`

**Step 1: Add color section and settings**

Inside `scarf_customize_register()`, add:

```php
// Section: Colors
$wp_customize->add_section( 'scarf_colors', array(
    'title' => esc_html__( 'رنگ‌ها', 'scarf' ),
    'panel' => 'scarf_panel',
) );

$colors = array(
    'scarf_color_primary'        => array( 'label' => 'رنگ اصلی',           'default' => '#d83f5f' ),
    'scarf_color_primary_hover'  => array( 'label' => 'رنگ اصلی (هاور)',     'default' => '#c93452' ),
    'scarf_color_primary_soft'   => array( 'label' => 'رنگ اصلی (نرم)',      'default' => '#fff1f4' ),
    'scarf_color_secondary'      => array( 'label' => 'رنگ فرعی',           'default' => '#19bfd3' ),
    'scarf_color_secondary_soft' => array( 'label' => 'رنگ فرعی (نرم)',     'default' => '#e9fbfd' ),
    'scarf_color_accent'         => array( 'label': 'رنگ لهجه',            'default' => '#b76e79' ),
    'scarf_color_text'           => array( 'label' => 'رنگ متن',            'default' => '#232933' ),
    'scarf_color_text_soft'      => array( 'label' => 'رنگ متن نرم',        'default' => '#5f6773' ),
    'scarf_color_background'     => array( 'label' => 'رنگ پس‌زمینه',       'default' => '#f6f7f9' ),
    'scarf_color_surface'        => array( 'label' => 'رنگ سطح',            'default' => '#ffffff' ),
    'scarf_color_border'         => array( 'label' => 'رنگ حاشیه',          'default' => '#e6e8ec' ),
    'scarf_color_discount'       => array( 'label' => 'رنگ تخفیف',          'default' => '#d83f5f' ),
);

foreach ( $colors as $id => $args ) {
    $wp_customize->add_setting( $id, array(
        'default'           => $args['default'],
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
        'label'   => esc_html__( $args['label'], 'scarf' ),
        'section' => 'scarf_colors',
    ) ) );
}
```

**Step 2: Add transport for live preview**

At the bottom of `inc/customizer.php`, add:

```php
function scarf_customize_preview_js() {
    wp_enqueue_script( 'scarf-customizer-preview', SCARF_URI . '/assets/js/customizer-preview.js', array( 'customize-preview' ), SCARF_VERSION, true );
}
add_action( 'customize_preview_init', 'scarf_customize_preview_js' );
```

**Step 3: Create customizer-preview.js**

Create `wp-content/themes/scarf/assets/js/customizer-preview.js`:

```javascript
( function( $ ) {
    'use strict';

    var cssVars = {
        'scarf_color_primary':        '--scarf-color-primary',
        'scarf_color_primary_hover':  '--scarf-color-primary-hover',
        'scarf_color_primary_soft':   '--scarf-color-primary-soft',
        'scarf_color_secondary':      '--scarf-color-secondary',
        'scarf_color_secondary_soft': '--scarf-color-secondary-soft',
        'scarf_color_accent':         '--scarf-color-accent',
        'scarf_color_text':           '--scarf-color-text',
        'scarf_color_text_soft':      '--scarf-color-text-soft',
        'scarf_color_background':     '--scarf-color-background',
        'scarf_color_surface':        '--scarf-color-surface',
        'scarf_color_border':         '--scarf-color-border',
        'scarf_color_discount':       '--scarf-color-discount',
    };

    $.each( cssVars, function( setting, cssVar ) {
        wp.customize( setting, function( value ) {
            value.bind( function( newVal ) {
                document.documentElement.style.setProperty( cssVar, newVal );
            } );
        } );
    } );
} )( jQuery );
```

**Step 4: Verify**

- Run: `php -l wp-content/themes/scarf/inc/customizer.php` → No errors
- Visit customize.php → Colors section visible with all 12 color pickers
- Change a color → Live preview updates without page reload

---

### Task 5: Add Typography settings to Customizer

**Objective:** Add font family and heading size controls.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/assets/js/customizer-preview.js`

**Step 1: Add typography section**

Inside `scarf_customize_register()`, add:

```php
// Section: Typography
$wp_customize->add_section( 'scarf_typography', array(
    'title' => esc_html__( 'تایپوگرافی', 'scarf' ),
    'panel' => 'scarf_panel',
) );

// Font family (select)
$wp_customize->add_setting( 'scarf_font_family', array(
    'default'           => 'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_font_family', array(
    'label'   => esc_html__( 'فونت خانواده', 'scarf' ),
    'section' => 'scarf_typography',
    'type'    => 'select',
    'choices' => array(
        'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif'             => 'Vazirmatn',
        'IRANSans, Vazirmatn, Tahoma, Arial, sans-serif'             => 'IRANSans',
        'Tahoma, Vazirmatn, IRANSans, Arial, sans-serif'             => 'Tahoma',
        'Vazirmatn, Tahoma, Arial, sans-serif'                       => 'Vazirmatn (بدون IRANSans)',
    ),
) );

// Heading scale (select)
$wp_customize->add_setting( 'scarf_heading_scale', array(
    'default'           => '1',
    'sanitize_callback' => 'esc_attr',
) );
$wp蜩$customizer->add_control( 'scarf_heading_scale', array(
    'label'   => esc_html__( 'اندازه عناوین', 'scarf' ),
    'section' => 'scarf_typography',
    'type'    => 'select',
    'choices' => array(
        '0.9'  => 'کوچک‌تر',
        '1'    => 'عادی',
        '1.1'  => 'بزرگ‌تر',
        '1.2'  => 'خیلی بزرگ',
    ),
) );
```

**Step 2: Add inline CSS for typography**

In `scarf_customizer_css()`, add:

```php
$font_family = get_theme_mod( 'scarf_font_family', 'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif' );
$heading_scale = get_theme_mod( 'scarf_heading_scale', '1' );

$css .= '--scarf-font-family: ' . esc_attr( $font_family ) . ';';
$css .= '--scarf-font-2xl: ' . ( 1.75 * floatval( $heading_scale ) ) . 'rem;';
$css .= '--scarf-font-xl: ' . ( 1.375 * floatval( $heading_scale ) ) . 'rem;';
$css .= '--scarf-font-lg: ' . ( 1.125 * floatval( $heading_scale ) ) . 'rem;';
```

**Step 3: Add to preview JS**

```javascript
wp.customize( 'scarf_font_family', function( value ) {
    value.bind( function( newVal ) {
        document.documentElement.style.setProperty( '--scarf-font-family', newVal );
    } );
} );
```

**Step 4: Verify**

- Run: `php -l wp-content/themes/scarf/inc/customizer.php` → No errors
- Change font family → Live preview updates

---

### Task 6: Add Header settings to Customizer

**Objective:** Add controls for sticky header and showing/hiding header elements.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/assets/css/main.css`

**Step 1: Add header section**

```php
// Section: Header
$wp_customize->add_section( 'scarf_header', array(
    'title' => esc_html__( 'هدر', 'scarf' ),
    'panel' => 'scarf_panel',
) );

// Sticky header
$wp_customize->add_setting( 'scarf_sticky_header', array(
    'default'           => 'yes',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_sticky_header', array(
    'label'   => esc_html__( 'هدر چسبنده', 'scarf' ),
    'section' => 'scarf_header',
    'type'    => 'radio',
    'choices' => array(
        'yes' => esc_html__( 'فعال', 'scarf' ),
        'no'  => esc_html__( 'غیرفعال', 'scarf' ),
    ),
) );

// Show search
$wp_customize->add_setting( 'scarf_show_search', array(
    'default'           => 'yes',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_show_search', array(
    'label'   => esc_html__( 'نمایش جستجو', 'scarf' ),
    'section' => 'scarf_header',
    'type'    => 'checkbox',
) );

// Show account link
$wp_customize->add_setting( 'scarf_show_account', array(
    'default'           => 'yes',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_show_account', array(
    'label'   => esc_html__( 'نمایش حساب کاربری', 'scarf' ),
    'section' => 'scarf_header',
    'type'    => 'checkbox',
) );
```

**Step 2: Apply sticky header setting in CSS**

In `scarf_customizer_css()`:

```php
$sticky = get_theme_mod( 'scarf_sticky_header', 'yes' );
if ( 'no' === $sticky ) {
    $css .= '.scarf-header { position: relative; }';
}
```

**Step 3: Verify**

- Run: `php -l wp-content/themes/scarf/inc/customizer.php` → No errors
- Toggle sticky header off → Header should no longer be sticky

---

### Task 7: Add Footer settings to Customizer

**Objective:** Add controls for copyright text and social media links.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/footer.php`

**Step 1: Add footer section**

```php
// Section: Footer
$wp_customize->add_section( 'scarf_footer', array(
    'title' => esc_html__( 'فوتر', 'scarf' ),
    'panel' => 'scarf_panel',
) );

// Copyright text
$wp_customize->add_setting( 'scarf_copyright_text', array(
    'default'           => '',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_copyright_text', array(
    'label'   => esc_html__( 'متن کپی‌رایت', 'scarf' ),
    'section' => 'scarf_footer',
    'type'    => 'text',
) );

// Social links
$socials = array(
    'scarf_instagram' => 'لینک اینستاگرام',
    'scarf_telegram'  => 'لینک تلگرام',
    'scarf_whatsapp'  => 'لینک واتساپ',
);

foreach ( $socials as $id => $label ) {
    $wp_customize->add_setting( $id, array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( $id, array(
        'label'   => esc_html__( $label, 'scarf' ),
        'section' => 'scarf_footer',
        'type'    => 'url',
    ) );
}
```

**Step 2: Update footer.php to use Customizer values**

Replace hardcoded social links with:

```php
$instagram = get_theme_mod( 'scarf_instagram', '#' );
$telegram  = get_theme_mod( 'scarf_telegram', '#' );
$whatsapp  = get_theme_mod( 'scarf_whatsapp', '#' );
```

And update the `<a href="#">` to use these values.

**Step 3: Update copyright**

Replace hardcoded copyright with:

```php
$copyright = get_theme_mod( 'scarf_copyright_text', '' );
if ( $copyright ) {
    echo '<p class="scarf-footer__copyright">' . esc_html( $copyright ) . '</p>';
} else {
    // default copyright
    printf( esc_html__( 'تمام حقوق محفوظ است %s', 'scarf' ), '&copy; ' . date_i18n( 'Y' ) );
}
```

**Step 4: Verify**

- Run: `php -l wp-content/themes/scarf/footer.php` → No errors
- Change social links in Customizer → Footer links update

---

### Task 8: Add Hero settings to Customizer

**Objective:** Add controls for hero title, description, CTA text/link, and background color.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/template-parts/hero-section.php`

**Step 1: Add hero section**

```php
// Section: Hero
$wp_customize->add_section( 'scarf_hero', array(
    'title' => esc_html__( 'بنر اصلی', 'scarf' ),
    'panel' => 'scarf_panel',
) );

$hero_fields = array(
    'scarf_hero_title'       => array( 'label' => 'عنوان بنر',       'default' => 'جدیدترین شال و روسری‌ها' ),
    'scarf_hero_description' => array( 'label' => 'توضیحات بنر',     'default' => 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب' ),
    'scarf_hero_cta_text'    => array( 'label' => 'متن دکمه',       'default' => 'مشاهده محصولات' ),
    'scarf_hero_cta_url'     => array( 'label' => 'لینک دکمه',      'default' => '' ),
    'scarf_hero_bg_color'    => array( 'label' => 'رنگ پس‌زمینه',   'default' => '#1a1a2e' ),
);

foreach ( $hero_fields as $id => $args ) {
    $sanitize = ( 'scarf_hero_bg_color' === $id ) ? 'sanitize_hex_color' : 'esc_attr';
    $type     = ( 'scarf_hero_cta_url' === $id ) ? 'url' : ( 'scarf_hero_bg_color' === $id ? 'color' : 'text' );

    $wp_customize->add_setting( $id, array(
        'default'           => $args['default'],
        'sanitize_callback' => $sanitize,
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( $id, array(
        'label'   => esc_html__( $args['label'], 'scarf' ),
        'section' => 'scarf_hero',
        'type'    => $type,
    ) );
}
```

**Step 2: Update hero-section.php to use Customizer values**

Replace hardcoded text with:

```php
$title       = get_theme_mod( 'scarf_hero_title', 'جدیدترین شال و روسری‌ها' );
$description = get_theme_mod( 'scarf_hero_description', 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب' );
$cta_text    = get_theme_mod( 'scarf_hero_cta_text', 'مشاهده محصولات' );
$cta_url     = get_theme_mod( 'scarf_hero_cta_url', '' );
$bg_color    = get_theme_mod( 'scarf_hero_bg_color', '#1a1a2e' );

if ( empty( $cta_url ) ) {
    $cta_url = $shop_url;
}
```

Then use these variables in the template.

**Step 3: Add hero background color to inline CSS**

```php
$hero_bg = get_theme_mod( 'scarf_hero_bg_color', '#1a1a2e' );
$css .= '.scarf-hero__bg { background-color: ' . esc_attr( $hero_bg ) . '; }';
```

**Step 4: Verify**

- Run: `php -l wp-content/themes/scarf/template-parts/hero-section.php` → No errors
- Change hero title in Customizer → Preview updates

---

### Task 9: Add Contact Info settings to Customizer

**Objective:** Add controls for phone, email, address, and working hours.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/footer.php`

**Step 1: Add contact section**

```php
// Section: Contact
$wp_customize->add_section( 'scarf_contact', array(
    'title' => esc_html__( 'اطلاعات تماس', 'scarf' ),
    'panel' => 'scarf_panel',
) );

$contact_fields = array(
    'scarf_phone'    => array( 'label' => 'تلفن',          'default' => '۰۲۱-۱۲۳۴۵۶۷۸' ),
    'scarf_email'    => array( 'label' => 'ایمیل',         'default' => 'info@scarfstore.ir' ),
    'scarf_address'  => array( 'label' => 'آدرس',          'default' => '' ),
    'scarf_hours'    => array( 'label' => 'ساعات پاسخگویی', 'default' => '۹ صبح تا ۱۸' ),
);

foreach ( $contact_fields as $id => $args ) {
    $wp_customize->add_setting( $id, array(
        'default'           => $args['default'],
        'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( $id, array(
        'label'   => esc_html__( $args['label'], 'scarf' ),
        'section' => 'scarf_contact',
        'type'    => 'text',
    ) );
}
```

**Step 2: Update footer.php to use Customizer values**

Replace hardcoded contact info with:

```php
$phone   = get_theme_mod( 'scarf_phone', '۰۲۱-۱۲۳۴۵۶۷۸' );
$email   = get_theme_mod( 'scarf_email', 'info@scarfstore.ir' );
$address = get_theme_mod( 'scarf_address', '' );
$hours   = get_theme_mod( 'scarf_hours', '۹ صبح تا ۱۸' );
```

**Step 3: Verify**

- Run: `php -l wp-content/themes/scarf/footer.php` → No errors
- Change phone number in Customizer → Footer updates

---

## Phase C: Final Integration

### Task 10: Wire up customizer-preview.js enqueue

**Objective:** Make sure the preview JS file is loaded correctly.

**Files:**
- Verify: `wp-content/themes/scarf/inc/customizer.php`

**Step 1: Verify enqueue**

Check that `scarf_customize_preview_js()` is properly registered and enqueued.

**Step 2: Verify**

- Open Customizer → Make a change → Live preview works without page refresh

---

### Task 11: Full Playwright validation

**Objective:** Test all Customizer sections and bug fixes at 3 viewports.

**Files:**
- Screenshots saved to: `playwright-screenshots/`

**Step 1: Test homepage**
- Desktop 1440×900: Header renders, Hero text is customizable
- Tablet 768×1024: Layout responsive
- Mobile 390×844: Header compact, hero stacks

**Step 2: Test shop page**
- Desktop 1440×900: Container has proper padding (bug fix verified)
- Add product to cart → Cart count updates without refresh (AJAX verified)

**Step 3: Test Customizer**
- Visit `/wp-admin/customize.php`
- All 6 sections visible under "تنظیمات قالب شال" panel
- Change a color → Live preview updates
- Change hero title → Live preview updates

---

### Task 12: Update HANDOFF.md

**Objective:** Document all changes in HANDOFF.md.

**Files:**
- Modify: `HANDOFF.md`

Add entries for:
- Bug fixes (AJAX cart, container spacing)
- Customizer implementation (6 sections)
- New files created
- Architecture decisions

---

## Files Changed Summary

| File | Action |
|------|--------|
| `wp-content/themes/scarf/functions.php` | Modify (add require, cart fragment) |
| `wp-content/themes/scarf/inc/customizer.php` | Create |
| `wp-content/themes/scarf/assets/js/customizer-preview.js` | Create |
| `wp-content/themes/scarf/assets/js/main.js` | Modify (if needed) |
| `wp-content/themes/scarf/assets/css/main.css` | Verify (tokens already exist) |
| `wp-content/themes/scarf/assets/css/woocommerce.css` | Modify (container fix) |
| `wp-content/themes/scarf/header.php` | Modify (always show cart count) |
| `wp-content/themes/scarf/footer.php` | Modify (use Customizer values) |
| `wp-content/themes/scarf/template-parts/hero-section.php` | Modify (use Customizer values) |
| `HANDOFF.md` | Modify (document changes) |

## Risks

1. **CSS specificity** — Customizer inline styles use `!important` if they need to override existing rules. Keep to minimum.
2. **WooCommerce AJAX** — Cart fragments need `wc_cart_fragments` to be active. Verify WooCommerce hasn't disabled it.
3. **Customizer transport** — Use `postMessage` for colors/fonts (live preview), `refresh` for structural changes (header/footer).
4. **Backward compatibility** — All Customizer settings have sensible defaults matching current hardcoded values. Site looks identical before and after.

## Open Questions

1. Should we add image upload controls for Hero background? (Future enhancement)
2. Should we add a "Reset to defaults" button? (Not needed now — YAGNI)
