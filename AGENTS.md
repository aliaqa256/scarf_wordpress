# AGENTS.md — Scarf WordPress Theme Project

## Project Overview

This project is a custom WordPress/WooCommerce theme for an online scarf and shawl store.

Theme name: `scarf`

The design direction is inspired by modern Iranian e-commerce UX patterns, especially Digikala-style product discovery, layout density, cards, filters, badges, responsive behavior, and RTL Persian shopping experience.

Important: Do not copy Digikala assets, logos, exact UI, proprietary code, icons, text, brand identity, or copyrighted material. Use it only as product/UX inspiration.

---

## Core Technologies

1. **Native WordPress Customizer**: Used for changing color themes and core settings easily by designers.
2. **Gutenberg Block Editor**: Used for building pages with drag and drop elements. We will rely on block patterns and custom blocks to allow designers to build layouts like Hero sections and dynamic Category grids.
3. **WooCommerce**: For the store functionality.

---

## Core Rules

1. Prefer native WordPress/WooCommerce APIs and features (Customizer, Block Editor).
2. Keep the project RTL-first and Persian-friendly.
3. Keep the code clean, minimal, and maintainable.
4. Do not use paid plugins or paid assets.

---

## Project Structure

Expected WordPress project structure:

```text
wp-content/
  themes/
    scarf/
```

The custom theme must live here:
`wp-content/themes/scarf/`

Prefer this structure where useful:
```text
scarf/
  style.css
  functions.php
  index.php
  header.php
  footer.php
  assets/
    css/
    js/
    images/
  inc/
    customizer.php
  template-parts/
  patterns/
```

---

## Theme Requirements

The `scarf` theme should support:

* WordPress standard theme features
* WooCommerce support
* Full Site Editing (FSE) / Block Editor support for page building
* RTL layout and Persian typography
* Responsive design

---

## Development Standards

Use:

* PHP compatible with modern WordPress hosting
* WordPress Coding Standards as much as practical
* Escaping functions: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`
* Translation functions: `__()`, `_e()`, `esc_html__()`, `esc_attr__()`
* Text domain: `scarf`

---

## CSS Rules

Rules:
* RTL-first.
* Use CSS custom properties for design tokens, which will be dynamically updated by the WordPress Customizer.

```css
:root {
  --scarf-color-primary: #d83f5f;
  --scarf-color-secondary: #19bfd3;
}
```

---

## Customization & Gutenberg Blocks

* **Color Themes**: Implemented via `inc/customizer.php` and dynamic inline CSS injection to override CSS variables.
* **Hero Section**: Implemented as a customizable Gutenberg Block or Pattern.
* **Dynamic Categories**: Implemented as a dynamic block or block pattern to pull product categories automatically.

---

## Validation Checklist

Before marking a UI stage complete, check:

* Persian UI text
* RTL layout
* Mobile responsiveness
* Customizer settings working correctly
* Gutenberg blocks drag-and-drop working

Use Playwright MCP when visual/browser behavior is relevant.
