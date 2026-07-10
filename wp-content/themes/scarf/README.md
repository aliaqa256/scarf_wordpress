# Scarf — Persian RTL WooCommerce Theme

A WordPress/WooCommerce theme for scarf and shawl stores, designed with Persian e-commerce UX patterns and full RTL support.

## Requirements

- WordPress 6.0+
- WooCommerce 8.0+ (recommended)
- PHP 7.4+

## Features

- RTL-first Persian layout
- WooCommerce product listing, single product, cart, and checkout styling
- Product cards with discount badges, stock badges, and sale percentage
- Shop archive with sidebar filters and responsive filter toggle
- Ultimate Member page styling (login, register, account, profile)
- Persian e-commerce footer with trust row and social icons
- Inline SVG placeholder image system (no external CDN)
- Mobile-first responsive design (mobile menu, filter drawer)
- Skip link, focus-visible outlines, aria-labels, and semantic HTML
- CSS custom properties for easy theme token customization
- No WooCommerce template overrides — hooks + CSS only

## Setup

1. Upload the `scarf` folder to `wp-content/themes/`
2. Activate the theme from **Appearance > Themes**
3. (Optional) Install and activate WooCommerce
4. (Optional) Install and activate Ultimate Member
5. Navigate to **Appearance > Menus** and assign a menu to the `menu-primary` location

## Theme Customization

Edit CSS custom properties in `assets/css/main.css` to change colors, spacing, typography, and radius tokens:

```css
:root {
  --scarf-color-primary: #d83f5f;
  --scarf-color-secondary: #19bfd3;
  /* ... */
}
```

## Translation

All user-facing strings are translatable with text domain `scarf`.

To create a Persian translation:

1. Copy `languages/scarf.pot` (if available) or generate via WP-CLI
2. Translate strings to Persian
3. Save as `languages/fa_IR.mo`

## Development

```
wp-content/themes/scarf/
├── style.css              # Theme metadata
├── functions.php          # Theme setup, enqueues, helpers
├── header.php             # Site header (skip link, search, nav, cart)
├── footer.php             # Site footer (trust row, 4-column grid, social)
├── index.php              # Main content fallback
├── front-page.php         # Homepage with section parts
├── searchform.php         # Search form template
├── inc/
│   ├── template-helpers.php   # Placeholder SVG + section heading helpers
│   └── woocommerce.php        # WooCommerce hooks and filters
├── template-parts/
│   ├── hero-section.php       # Homepage hero banner
│   ├── section-categories.php # Category grid
│   ├── section-offers.php     # Discounted products
│   ├── section-new-arrivals.php
│   ├── section-best-sellers.php
│   ├── section-services.php   # Trust/feature icons
│   └── section-trust.php      # Footer trust row (inline SVGs)
└── assets/
    ├── css/
    │   ├── main.css            # Design tokens, layout, components
    │   ├── woocommerce.css     # WooCommerce styles
    │   └── ultimate-member.css # UM page styles
    └── js/
        └── main.js             # Mobile menu + filter drawer toggles
```

## Accessibility

- Skip link to main content
- Focus-visible outlines on all interactive elements
- aria-labels on icon-only links and buttons
- aria-expanded and aria-controls on menu/filter toggles
- Semantic HTML structure (header, nav, main, footer)

## License

GNU GPL v2 or later
