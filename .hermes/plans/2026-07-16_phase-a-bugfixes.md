# Phase A: Bug Fixes — Scarf Theme

> **For Hermes:** Implement these 2 bug fixes, then update kanban task statuses.

**Goal:** Fix shop page container spacing and add AJAX cart update support.

**Architecture:** Minimal changes — CSS fix for container, PHP filter + HTML tweak for AJAX cart. No new files needed.

---

## Task 1: Fix shop page container spacing

**Objective:** The shop page content (products, sidebar, sorting) touches the screen edges. Add proper container constraints.

**Root cause:** `.scarf-archive-layout` is rendered inside `<main>` but has no `max-width`, `margin-inline: auto`, or `padding-inline`. The `.scarf-container` class is not applied to it.

**Files:**
- Modify: `wp-content/themes/scarf/assets/css/woocommerce.css`

**Step 1: Add container properties to `.scarf-archive-layout`**

In `assets/css/woocommerce.css`, find the existing rule at line 172:

```css
.scarf-archive-layout {
    display: flex;
    flex-wrap: wrap;
    gap: var(--scarf-space-6);
    align-items: flex-start;
}
```

Replace with:

```css
.scarf-archive-layout {
    display: flex;
    flex-wrap: wrap;
    gap: var(--scarf-space-6);
    align-items: flex-start;
    max-width: var(--scarf-container-max);
    margin-inline: auto;
    padding-inline: var(--scarf-container-padding);
}
```

**Step 2: Verify**

- Run: `grep -A 8 'scarf-archive-layout {' wp-content/themes/scarf/assets/css/woocommerce.css`
- Expected: The 3 new properties (max-width, margin-inline, padding-inline) are present
- Visual: Open `http://localhost/shop/` — content should have proper side padding on desktop

**Kanban:** Mark `t_bc1f0db4` (باگ: کانتینر صفحه فروشگاه) as **done**.

---

## Task 2: Add WooCommerce AJAX cart fragments

**Objective:** The cart count badge in the header should update automatically when items are added/removed, without requiring a full page refresh.

**Root cause:** 
1. No `woocommerce_add_to_cart_fragments` filter exists in `functions.php`
2. The cart count span is conditionally rendered (only when count > 0), so AJAX can't replace it when cart becomes empty
3. WooCommerce's built-in `wc_cart_fragments` handles AJAX, but needs a consistent DOM element to replace

**Files:**
- Modify: `wp-content/themes/scarf/functions.php` (add filter)
- Modify: `wp-content/themes/scarf/header.php` (always render cart count span)

**Step 1: Add cart fragment filter in functions.php**

Add this function at the end of `functions.php` (before the closing `?>` or at end of file):

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

**Step 2: Always render cart count span in header.php**

In `header.php`, find lines 38-45:

```php
<?php
$cart_count = 0;
if ( WC()->cart ) {
    $cart_count = WC()->cart->get_cart_contents_count();
}
if ( $cart_count > 0 ) :
?>
    <span class="scarf-header__cart-count"><?php echo esc_html( $cart_count ); ?></span>
<?php endif; ?>
```

Replace with (always render the span, hide via CSS when 0):

```php
<?php
$cart_count = 0;
if ( WC()->cart ) {
    $cart_count = WC()->cart->get_cart_contents_count();
}
?>
<span class="scarf-header__cart-count<?php echo $cart_count === 0 ? ' scarf-header__cart-count--hidden' : ''; ?>"<?php echo $cart_count === 0 ? ' style="display:none"' : ''; ?>><?php echo esc_html( $cart_count ); ?></span>
```

**Step 3: Add hidden state CSS (optional, for clean hiding)**

In `assets/css/main.css`, after `.scarf-header__cart-count` rule (around line 343), add:

```css
.scarf-header__cart-count--hidden {
    display: none;
}
```

This ensures the span is hidden when empty but present in DOM for AJAX replacement.

**Step 4: Verify**

- Run: `php -l wp-content/themes/scarf/functions.php` → Expected: No syntax errors
- Run: `php -l wp-content/themes/scarf/header.php` → Expected: No syntax errors
- Run: `grep -n 'scarf_cart_fragment\|woocommerce_add_to_cart_fragments' wp-content/themes/scarf/functions.php`
- Expected: The new filter hook is present
- Visual: Add a product to cart → cart count badge should update without page refresh

**Kanban:** Mark `t_67683d06` (باگ: سبد خرید AJAX نداره) as **done**.

---

## Files Changed Summary

| File | Action | Lines changed |
|------|--------|---------------|
| `wp-content/themes/scarf/assets/css/woocommerce.css` | Modify | +3 lines (container properties) |
| `wp-content/themes/scarf/functions.php` | Modify | +10 lines (cart fragment filter) |
| `wp-content/themes/scarf/header.php` | Modify | ~5 lines (always render cart count) |
| `wp-content/themes/scarf/assets/css/main.css` | Modify | +3 lines (hidden cart count) |

## Risks

1. **WooCommerce AJAX enabled by default** — `wc_cart_fragments` script is auto-enqueued by WooCommerce. No extra setup needed.
2. **Empty cart behavior** — When cart is empty, the fragment replaces the span with count=0. The `--hidden` class keeps it invisible.
3. **No template overrides** — All changes are via hooks and CSS. Full WooCommerce compatibility maintained.

## Verification Checklist

- [ ] `php -l` passes on all modified PHP files
- [ ] Shop page has proper side padding at 1440px, 768px, 390px
- [ ] Cart count updates without page refresh when adding product
- [ ] Cart count hides when cart is empty
- [ ] Cart count shows when items exist
- [ ] No JavaScript console errors
- [ ] Kanban tasks marked as done
