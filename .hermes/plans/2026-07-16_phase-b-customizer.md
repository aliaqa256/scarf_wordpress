# Phase B: WordPress Customizer — Scarf Theme

> **For Hermes:** Implement Customizer sections one by one, verify each, then update kanban.

**Goal:** Add WordPress Customizer sections so colors, typography, header, footer, hero, and contact info can be edited from Appearance → Customize with live preview.

**Architecture:** 
- New file `inc/customizer.php` registers all settings
- New file `assets/js/customizer-preview.js` handles live preview
- `functions.php` requires the new file
- Templates read values via `get_theme_mod()`
- Inline CSS overrides CSS custom properties

**Tech Stack:** WordPress Customizer API, CSS Custom Properties, vanilla JS

---

## Task 1: Create `inc/customizer.php` skeleton + require it

**Objective:** Create the Customizer file with panel, color section, and inline CSS output. Require it from functions.php.

**Files:**
- Create: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/functions.php` (add require_once)

**Step 1: Create `inc/customizer.php`**

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Scarf Theme Customizer.
 *
 * @package Scarf
 */

function scarf_customize_register( $wp_customize ) {

    // ── Panel ──
    $wp_customize->add_panel( 'scarf_panel', array(
        'title'    => esc_html__( 'تنظیمات قالب شال', 'scarf' ),
        'priority' => 30,
    ) );

    // ── Section: Colors ──
    $wp_customize->add_section( 'scarf_colors', array(
        'title' => esc_html__( 'رنگ‌ها', 'scarf' ),
        'panel' => 'scarf_panel',
    ) );

    $scarf_colors = array(
        'scarf_color_primary'        => array( 'label' => 'رنگ اصلی',            'default' => '#d83f5f' ),
        'scarf_color_primary_hover'  => array( 'label' => 'رنگ اصلی (هاور)',      'default' => '#c93452' ),
        'scarf_color_primary_soft'   => array( 'label' => 'رنگ اصلی (نرم)',       'default' => '#fff1f4' ),
        'scarf_color_secondary'      => array( 'label' => 'رنگ فرعی',            'default' => '#19bfd3' ),
        'scarf_color_secondary_soft' => array( 'label' => 'رنگ فرعی (نرم)',      'default' => '#e9fbfd' ),
        'scarf_color_accent'         => array( 'label' => 'رنگ لهجه',            'default' => '#b76e79' ),
        'scarf_color_text'           => array( 'label' => 'رنگ متن',             'default' => '#232933' ),
        'scarf_color_text_soft'      => array( 'label' => 'رنگ متن نرم',         'default' => '#5f6773' ),
        'scarf_color_background'     => array( 'label' => 'رنگ پس‌زمینه',        'default' => '#f6f7f9' ),
        'scarf_color_surface'        => array( 'label' => 'رنگ سطح',             'default' => '#ffffff' ),
        'scarf_color_border'         => array( 'label' => 'رنگ حاشیه',           'default' => '#e6e8ec' ),
        'scarf_color_discount'       => array( 'label' => 'رنگ تخفیف',           'default' => '#d83f5f' ),
    );

    foreach ( $scarf_colors as $id => $args ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $args['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
            'label'   => esc_html( $args['label'] ),
            'section' => 'scarf_colors',
        ) ) );
    }
}
add_action( 'customize_register', 'scarf_customize_register' );

/**
 * Output inline CSS from Customizer values.
 */
function scarf_customizer_css() {
    $primary        = get_theme_mod( 'scarf_color_primary', '#d83f5f' );
    $primary_hover  = get_theme_mod( 'scarf_color_primary_hover', '#c93452' );
    $primary_soft   = get_theme_mod( 'scarf_color_primary_soft', '#fff1f4' );
    $secondary      = get_theme_mod( 'scarf_color_secondary', '#19bfd3' );
    $secondary_soft = get_theme_mod( 'scarf_color_secondary_soft', '#e9fbfd' );
    $accent         = get_theme_mod( 'scarf_color_accent', '#b76e79' );
    $text           = get_theme_mod( 'scarf_color_text', '#232933' );
    $text_soft      = get_theme_mod( 'scarf_color_text_soft', '#5f6773' );
    $background     = get_theme_mod( 'scarf_color_background', '#f6f7f9' );
    $surface        = get_theme_mod( 'scarf_color_surface', '#ffffff' );
    $border         = get_theme_mod( 'scarf_color_border', '#e6e8ec' );
    $discount       = get_theme_mod( 'scarf_color_discount', '#d83f5f' );

    $css = ':root {';
    $css .= '--scarf-color-primary: ' . esc_attr( $primary ) . ';';
    $css .= '--scarf-color-primary-hover: ' . esc_attr( $primary_hover ) . ';';
    $css .= '--scarf-color-primary-soft: ' . esc_attr( $primary_soft ) . ';';
    $css .= '--scarf-color-secondary: ' . esc_attr( $secondary ) . ';';
    $css .= '--scarf-color-secondary-soft: ' . esc_attr( $secondary_soft ) . ';';
    $css .= '--scarf-color-accent: ' . esc_attr( $accent ) . ';';
    $css .= '--scarf-color-text: ' . esc_attr( $text ) . ';';
    $css .= '--scarf-color-text-soft: ' . esc_attr( $text_soft ) . ';';
    $css .= '--scarf-color-background: ' . esc_attr( $background ) . ';';
    $css .= '--scarf-color-surface: ' . esc_attr( $surface ) . ';';
    $css .= '--scarf-color-border: ' . esc_attr( $border ) . ';';
    $css .= '--scarf-color-discount: ' . esc_attr( $discount ) . ';';
    $css .= '}';

    wp_add_inline_style( 'scarf-main', $css );
}
add_action( 'wp_enqueue_scripts', 'scarf_customizer_css' );
```

**Step 2: Require from functions.php**

Add after line 11 (`require_once SCARF_DIR . '/inc/woocommerce.php';`):

```php
require_once SCARF_DIR . '/inc/customizer.php';
```

**Step 3: Verify**

- Visit `http://localhost/wp-admin/customize.php`
- Panel "تنظیمات قالب شال" should appear
- "رنگ‌ها" section with 12 color pickers should be visible

---

## Task 2: Create `customizer-preview.js` + wire it up

**Objective:** Live preview when changing colors without page reload.

**Files:**
- Create: `wp-content/themes/scarf/assets/js/customizer-preview.js`
- Modify: `wp-content/themes/scarf/inc/customizer.php` (add enqueue)

**Step 1: Create `customizer-preview.js`**

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
        'scarf_color_discount':       '--scarf-color-discount'
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

**Step 2: Add enqueue to `inc/customizer.php`**

Add at the bottom of the file:

```php
function scarf_customize_preview_js() {
    wp_enqueue_script( 'scarf-customizer-preview', SCARF_URI . '/assets/js/customizer-preview.js', array( 'customize-preview' ), SCARF_VERSION, true );
}
add_action( 'customize_preview_init', 'scarf_customize_preview_js' );
```

**Step 3: Verify**

- Open Customizer → Change a color → Preview updates live without reload

---

## Task 3: Add Typography section

**Objective:** Font family and heading scale controls.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/assets/js/customizer-preview.js`

**Step 1: Add to `scarf_customize_register()` in customizer.php**

```php
// ── Section: Typography ──
$wp_customize->add_section( 'scarf_typography', array(
    'title' => esc_html__( 'تایپوگرافی', 'scarf' ),
    'panel' => 'scarf_panel',
) );

// Font family
$wp_customize->add_setting( 'scarf_font_family', array(
    'default'           => 'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif',
    'sanitize_callback' => 'esc_attr',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( 'scarf_font_family', array(
    'label'   => esc_html__( 'فونت خانواده', 'scarf' ),
    'section' => 'scarf_typography',
    'type'    => 'select',
    'choices' => array(
        'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif'  => 'Vazirmatn',
        'IRANSans, Vazirmatn, Tahoma, Arial, sans-serif'  => 'IRANSans',
        'Tahoma, Vazirmatn, IRANSans, Arial, sans-serif'  => 'Tahoma',
    ),
) );

// Heading scale
$wp_customize->add_setting( 'scarf_heading_scale', array(
    'default'           => '1',
    'sanitize_callback' => 'esc_attr',
    'transport'         => 'postMessage',
) );
$wp_customize->add_control( 'scarf_heading_scale', array(
    'label'   => esc_html__( 'اندازه عناوین', 'scarf' ),
    'section' => 'scarf_typography',
    'type'    => 'select',
    'choices' => array(
        '0.9' => 'کوچک‌تر',
        '1'   => 'عادی',
        '1.1' => 'بزرگ‌تر',
        '1.2' => 'خیلی بزرگ',
    ),
) );
```

**Step 2: Add to `scarf_customizer_css()`**

```php
$font_family   = get_theme_mod( 'scarf_font_family', 'Vazirmatn, IRANSans, Tahoma, Arial, sans-serif' );
$heading_scale = floatval( get_theme_mod( 'scarf_heading_scale', '1' ) );

$css .= '--scarf-font-family: ' . esc_attr( $font_family ) . ';';
$css .= '--scarf-font-2xl: ' . ( 1.75 * $heading_scale ) . 'rem;';
$css .= '--scarf-font-xl: ' . ( 1.375 * $heading_scale ) . 'rem;';
$css .= '--scarf-font-lg: ' . ( 1.125 * $heading_scale ) . 'rem;';
```

**Step 3: Add to preview JS**

```javascript
wp.customize( 'scarf_font_family', function( value ) {
    value.bind( function( newVal ) {
        document.documentElement.style.setProperty( '--scarf-font-family', newVal );
    } );
} );
wp.customize( 'scarf_heading_scale', function( value ) {
    value.bind( function( newVal ) {
        var s = parseFloat( newVal );
        document.documentElement.style.setProperty( '--scarf-font-2xl', ( 1.75 * s ) + 'rem' );
        document.documentElement.style.setProperty( '--scarf-font-xl', ( 1.375 * s ) + 'rem' );
        document.documentElement.style.setProperty( '--scarf-font-lg', ( 1.125 * s ) + 'rem' );
    } );
} );
```

---

## Task 4: Add Header settings

**Objective:** Sticky header toggle, show/hide search and account link.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/header.php`

**Step 1: Add to `scarf_customize_register()`**

```php
// ── Section: Header ──
$wp_customize->add_section( 'scarf_header_settings', array(
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
    'section' => 'scarf_header_settings',
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
    'section' => 'scarf_header_settings',
    'type'    => 'checkbox',
) );

// Show account
$wp_customize->add_setting( 'scarf_show_account', array(
    'default'           => 'yes',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_show_account', array(
    'label'   => esc_html__( 'نمایش حساب کاربری', 'scarf' ),
    'section' => 'scarf_header_settings',
    'type'    => 'checkbox',
) );
```

**Step 2: Add CSS for sticky toggle**

```php
$sticky = get_theme_mod( 'scarf_sticky_header', 'yes' );
if ( 'no' === $sticky ) {
    $css .= '.scarf-header{position:relative;}';
}
```

**Step 3: Update header.php**

Wrap search and account in conditionals:

```php
<?php if ( 'yes' === get_theme_mod( 'scarf_show_search', 'yes' ) ) : ?>
<div class="scarf-header__search">
    <?php get_search_form(); ?>
</div>
<?php endif; ?>

<?php if ( 'yes' === get_theme_mod( 'scarf_show_account', 'yes' ) ) : ?>
<a class="scarf-header__account" href="<?php echo esc_url( scarf_get_account_url() ); ?>">
    <?php esc_html_e( 'حساب کاربری', 'scarf' ); ?>
</a>
<?php endif; ?>
```

---

## Task 5: Add Footer settings

**Objective:** Copyright text and social media links.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/footer.php`

**Step 1: Add to `scarf_customize_register()`**

```php
// ── Section: Footer ──
$wp_customize->add_section( 'scarf_footer_settings', array(
    'title' => esc_html__( 'فوتر', 'scarf' ),
    'panel' => 'scarf_panel',
) );

// Copyright
$wp_customize->add_setting( 'scarf_copyright_text', array(
    'default'           => '',
    'sanitize_callback' => 'esc_attr',
) );
$wp_customize->add_control( 'scarf_copyright_text', array(
    'label'   => esc_html__( 'متن کپی‌رایت', 'scarf' ),
    'section' => 'scarf_footer_settings',
    'type'    => 'text',
) );

// Social links
$scarf_socials = array(
    'scarf_instagram' => 'لینک اینستاگرام',
    'scarf_telegram'  => 'لینک تلگرام',
    'scarf_whatsapp'  => 'لینک واتساپ',
);
foreach ( $scarf_socials as $id => $label ) {
    $wp_customize->add_setting( $id, array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( $id, array(
        'label'   => esc_html( $label ),
        'section' => 'scarf_footer_settings',
        'type'    => 'url',
    ) );
}
```

**Step 2: Update footer.php social links**

Replace hardcoded `href="#"` with:

```php
$instagram = get_theme_mod( 'scarf_instagram', '#' );
$telegram  = get_theme_mod( 'scarf_telegram', '#' );
$whatsapp  = get_theme_mod( 'scarf_whatsapp', '#' );
```

And update each `<a href="#">` to `<a href="<?php echo esc_url( $instagram ); ?>">` etc.

**Step 3: Update footer.php copyright**

```php
$copyright = get_theme_mod( 'scarf_copyright_text', '' );
if ( $copyright ) {
    echo '<p class="scarf-footer__copyright">' . esc_html( $copyright ) . '</p>';
} else {
    printf( esc_html__( 'تمام حقوق محفوظ است %s', 'scarf' ), '&copy; ' . date_i18n( 'Y' ) );
}
```

---

## Task 6: Add Hero settings

**Objective:** Title, description, CTA text/link, background color.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/template-parts/hero-section.php`

**Step 1: Add to `scarf_customize_register()`**

```php
// ── Section: Hero ──
$wp_customize->add_section( 'scarf_hero_settings', array(
    'title' => esc_html__( 'بنر اصلی', 'scarf' ),
    'panel' => 'scarf_panel',
) );

$hero_fields = array(
    'scarf_hero_title'       => array( 'label' => 'عنوان بنر',    'default' => 'جدیدترین شال و روسری‌ها',              'type' => 'text' ),
    'scarf_hero_description' => array( 'label' => 'توضیحات بنر',  'default' => 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار', 'type' => 'textarea' ),
    'scarf_hero_cta_text'    => array( 'label' => 'متن دکمه',    'default' => 'مشاهده محصولات',                      'type' => 'text' ),
    'scarf_hero_cta_url'     => array( 'label' => 'لینک دکمه',   'default' => '',                                    'type' => 'url' ),
    'scarf_hero_bg_color'    => array( 'label' => 'رنگ پس‌زمینه', 'default' => '#1a1a2e',                             'type' => 'color' ),
);

foreach ( $hero_fields as $id => $args ) {
    $sanitize = ( 'scarf_hero_bg_color' === $id ) ? 'sanitize_hex_color' : 'esc_attr';
    $wp_customize->add_setting( $id, array(
        'default'           => $args['default'],
        'sanitize_callback' => $sanitize,
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( $id, array(
        'label'   => esc_html( $args['label'] ),
        'section' => 'scarf_hero_settings',
        'type'    => $args['type'],
    ) );
}
```

**Step 2: Add hero bg to inline CSS**

```php
$hero_bg = get_theme_mod( 'scarf_hero_bg_color', '#1a1a2e' );
$css .= '.scarf-hero__bg{background-color:' . esc_attr( $hero_bg ) . ';}';
```

**Step 3: Update hero-section.php**

Replace hardcoded text with:

```php
$title       = get_theme_mod( 'scarf_hero_title', 'جدیدترین شال و روسری‌ها' );
$description = get_theme_mod( 'scarf_hero_description', 'مجموعه‌ای از بهترین و شیک‌ترین شال و روسری‌های بازار با کیفیت عالی و قیمت مناسب' );
$cta_text    = get_theme_mod( 'scarf_hero_cta_text', 'مشاهده محصولات' );
$cta_url     = get_theme_mod( 'scarf_hero_cta_url', '' );
$hero_bg     = get_theme_mod( 'scarf_hero_bg_color', '#1a1a2e' );

if ( empty( $cta_url ) ) {
    $cta_url = $shop_url;
}
```

Then use `<?php echo esc_html( $title ); ?>` etc. in the template.

---

## Task 7: Add Contact Info settings

**Objective:** Phone, email, address, working hours.

**Files:**
- Modify: `wp-content/themes/scarf/inc/customizer.php`
- Modify: `wp-content/themes/scarf/footer.php`

**Step 1: Add to `scarf_customize_register()`**

```php
// ── Section: Contact ──
$wp_customize->add_section( 'scarf_contact', array(
    'title' => esc_html__( 'اطلاعات تماس', 'scarf' ),
    'panel' => 'scarf_panel',
) );

$contact_fields = array(
    'scarf_phone'   => array( 'label' => 'تلفن',           'default' => '۰۲۱-۱۲۳۴۵۶۷۸' ),
    'scarf_email'   => array( 'label' => 'ایمیل',          'default' => 'info@scarfstore.ir' ),
    'scarf_address' => array( 'label' => 'آدرس',           'default' => '' ),
    'scarf_hours'   => array( 'label' => 'ساعات پاسخگویی', 'default' => '۹ صبح تا ۱۸' ),
);

foreach ( $contact_fields as $id => $args ) {
    $wp_customize->add_setting( $id, array(
        'default'           => $args['default'],
        'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( $id, array(
        'label'   => esc_html( $args['label'] ),
        'section' => 'scarf_contact',
        'type'    => 'text',
    ) );
}
```

**Step 2: Update footer.php contact section**

Replace hardcoded contact with:

```php
$phone   = get_theme_mod( 'scarf_phone', '۰۲۱-۱۲۳۴۵۶۷۸' );
$email   = get_theme_mod( 'scarf_email', 'info@scarfstore.ir' );
$address = get_theme_mod( 'scarf_address', '' );
$hours   = get_theme_mod( 'scarf_hours', '۹ صبح تا ۱۸' );
```

Then use these variables in the template.

---

## Task 8: Final verification + kanban update

**Objective:** Test all sections, take screenshots, update kanban.

**Steps:**
1. Visit `/wp-admin/customize.php` — verify all 7 sections under panel
2. Change a color → live preview works
3. Change hero title → preview updates
4. Change social link → footer updates
5. Take screenshots at 1440×900
6. Mark 6 kanban tasks as done

---

## Files Changed Summary

| File | Action |
|------|--------|
| `wp-content/themes/scarf/inc/customizer.php` | **Create** |
| `wp-content/themes/scarf/assets/js/customizer-preview.js` | **Create** |
| `wp-content/themes/scarf/functions.php` | Modify (+1 line) |
| `wp-content/themes/scarf/header.php` | Modify (conditional search/account) |
| `wp-content/themes/scarf/footer.php` | Modify (use get_theme_mod for social/copyright/contact) |
| `wp-content/themes/scarf/template-parts/hero-section.php` | Modify (use get_theme_mod) |
| `wp-content/themes/scarf/assets/css/main.css` | No change needed |

## Risks

1. **Default values match current state** — Site looks identical before and after Customizer setup.
2. **Transport: postMessage** — Colors/fonts/hero use live preview. Structural changes (header/footer toggles) use refresh.
3. **No database changes** — All values stored in `wp_options` via `get_theme_mod`.
4. **Backward compatible** — If Customizer values are empty, defaults are used.
