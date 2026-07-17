# Phase C: Widget Areas — Scarf Theme

> **For Hermes:** Implement widget areas, verify with screenshots, update kanban.

**Goal:** Replace hardcoded footer columns with draggable widget areas. Add sidebar and homepage widget areas for drag-and-drop content management.

**Architecture:**
- Register widget areas in `functions.php` via `scarf_widgets_init`
- Replace hardcoded footer columns with `dynamic_sidebar()` calls
- Add CSS for widget styling (titles, links, social icons, contact info)
- Add widget areas to homepage for future block/pattern use

---

## Task 1: Register all widget areas in `functions.php`

**Objective:** Register 7 widget areas for footer, sidebar, and homepage.

**File:** `wp-content/themes/scarf/functions.php`

**Add after `scarf_cart_fragment` function:**

```php
function scarf_widgets_init() {
    // Footer columns (4)
    register_sidebar( array(
        'name'          => esc_html__( 'فوتر — ستون ۱', 'scarf' ),
        'id'            => 'footer-col-1',
        'description'   => esc_html__( 'ستون اول فوتر (راهنمای خرید)', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'فوتر — ستون ۲', 'scarf' ),
        'id'            => 'footer-col-2',
        'description'   => esc_html__( 'ستون دوم فوتر (خدمات مشتریان)', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'فوتر — ستون ۳', 'scarf' ),
        'id'            => 'footer-col-3',
        'description'   => esc_html__( 'ستون سوم فوتر (درباره فروشگاه + شبکه‌ها)', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'فوتر — ستون ۴', 'scarf' ),
        'id'            => 'footer-col-4',
        'description'   => esc_html__( 'ستون چهارم فوتر (ارتباط با ما)', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="scarf-footer__column-title widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Shop sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'سایدبار فروشگاه', 'scarf' ),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__( 'سایدبار صفحه آرشیو فروشگاه', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Homepage widget areas
    register_sidebar( array(
        'name'          => esc_html__( 'صفحه اصلی — بالای محصولات', 'scarf' ),
        'id'            => 'homepage-top',
        'description'   => esc_html__( 'بالای بخش محصولات صفحه اصلی', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s scarf-homepage-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title scarf-section-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'صفحه اصلی — پایین محصولات', 'scarf' ),
        'id'            => 'homepage-bottom',
        'description'   => esc_html__( 'پایین بخش محصولات صفحه اصلی', 'scarf' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s scarf-homepage-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title scarf-section-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'scarf_widgets_init' );
```

**Verify:** Visit Appearance → Widgets → All 7 areas should appear.

---

## Task 2: Update `footer.php` — Replace hardcoded columns with widgets

**Objective:** Each footer column renders `dynamic_sidebar()` instead of hardcoded HTML.

**File:** `wp-content/themes/scarf/footer.php`

**Replace the 4 `<div class="scarf-footer__column">` blocks with:**

```php
<div class="scarf-footer__main">
    <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
        <div class="scarf-footer__column">
            <?php if ( is_active_sidebar( 'footer-col-' . $i ) ) : ?>
                <?php dynamic_sidebar( 'footer-col-' . $i ); ?>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
</div>
```

**Keep:** Trust section, bottom/copyright section, social links (from Customizer).

---

## Task 3: Add widget CSS to `main.css`

**Objective:** Style widget titles, links, social icons inside footer widgets.

**File:** `wp-content/themes/scarf/assets/css/main.css`

**Add at the bottom:**

```css
/* Widget areas */
.widget {
    margin-bottom: var(--scarf-space-4);
}
.widget-title {
    font-weight: 700;
    margin-bottom: var(--scarf-space-3);
    color: var(--scarf-color-text);
}
.widget ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.widget ul li {
    margin-bottom: var(--scarf-space-2);
}
.widget ul li a {
    color: var(--scarf-color-text-soft);
    text-decoration: none;
    transition: color 0.2s;
}
.widget ul li a:hover {
    color: var(--scarf-color-primary);
}
.widget p {
    color: var(--scarf-color-text-soft);
    line-height: 1.6;
}
.scarf-footer__widget-social {
    display: flex;
    gap: var(--scarf-space-3);
    margin-top: var(--scarf-space-3);
}
.scarf-footer__widget-social a {
    color: var(--scarf-color-text-soft);
    transition: color 0.2s;
}
.scarf-footer__widget-social a:hover {
    color: var(--scarf-color-primary);
}
.scarf-homepage-widget {
    max-width: var(--scarf-container-max);
    margin-inline: auto;
    padding-inline: var(--scarf-container-padding);
    padding-block: var(--scarf-space-6);
}
```

---

## Task 4: Update `front-page.php` — Add homepage widget areas

**Objective:** Add widget areas before and after product sections.

**File:** `wp-content/themes/scarf/front-page.php`

**Update to:**

```php
<main id="main" class="site-main">
<?php
get_template_part( 'template-parts/hero-section' );
get_template_part( 'template-parts/section-categories' );

// Homepage widget: top
if ( is_active_sidebar( 'homepage-top' ) ) {
    dynamic_sidebar( 'homepage-top' );
}

get_template_part( 'template-parts/section-offers' );
get_template_part( 'template-parts/section-new-arrivals' );
get_template_part( 'template-parts/section-best-sellers' );
get_template_part( 'template-parts/section-services' );

// Homepage widget: bottom
if ( is_active_sidebar( 'homepage-bottom' ) ) {
    dynamic_sidebar( 'homepage-bottom' );
}
?>
</main>
```

---

## Task 5: Verify & screenshot

**Objective:** Take screenshots of all pages to confirm no visual regression.

**Steps:**
1. Homepage desktop (1440×900)
2. Homepage mobile (390×844)
3. Shop desktop (1440×900)
4. Shop mobile (390×844)
5. Visit Appearance → Widgets → Verify all 7 areas exist
6. Update kanban: mark 4 tasks done

---

## Files Changed Summary

| File | Action |
|------|--------|
| `functions.php` | Add `scarf_widgets_init` (register 7 sidebars) |
| `footer.php` | Replace 4 hardcoded columns with `dynamic_sidebar()` loop |
| `front-page.php` | Add `homepage-top` and `homepage-bottom` widget areas |
| `assets/css/main.css` | Add widget styling CSS |

## Risks

1. **No visual regression** — Default widgets are empty, so footer looks identical until widgets are added.
2. **Customizer social/contact still works** — Those are in Customizer, not widgets. Widgets are for general content (links, text, images).
3. **Widget content is drag-and-drop** — Designer can add/remove/reorder widgets from Appearance → Widgets.
