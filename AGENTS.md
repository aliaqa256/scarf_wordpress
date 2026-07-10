# AGENTS.md — Scarf WordPress Theme Project

## Project Overview

This project is a custom WordPress/WooCommerce theme for an online scarf and shawl store.

Theme name: `scarf`

Custom plugins, if created, must start with the prefix:

```text
scart-
```

Examples:

```text
scart-core
scart-ai-tryon
scart-custom-checkout
```

The design direction is inspired by modern Iranian e-commerce UX patterns, especially Digikala-style product discovery, layout density, cards, filters, badges, responsive behavior, and RTL Persian shopping experience.

Important: Do not copy Digikala assets, logos, exact UI, proprietary code, icons, text, brand identity, or copyrighted material. Use it only as product/UX inspiration.

---

## Core Rules

1. Work step by step.
2. Do not implement future stages unless explicitly requested.
3. Do not rewrite unrelated files.
4. Do not introduce unnecessary dependencies.
5. Do not use paid plugins or paid assets.
6. Prefer native WordPress/WooCommerce APIs.
7. Keep the project RTL-first and Persian-friendly.
8. Keep the code clean, minimal, and maintainable.
9. Do not make fake claims in comments, README, metadata, or UI.
10. Do not manage Git unless the user explicitly asks.

---

## Git Rules

Do not run or suggest Git operations unless the user explicitly asks.

Forbidden unless explicitly requested:

```bash
git add
git commit
git push
git pull
git reset
git checkout
git merge
git rebase
```

You may mention changed files in your final report, but do not stage or commit anything.

---

## Project Structure

Expected WordPress project structure:

```text
wp-content/
  themes/
    scarf/
  plugins/
    scart-*/
```

The custom theme must live here:

```text
wp-content/themes/scarf/
```

Any custom plugin must live here and start with `scart`:

```text
wp-content/plugins/scart-*/
```

Do not modify WordPress core files.

Do not modify third-party plugin files directly.

Do not modify third-party themes.

---

## Theme Requirements

The `scarf` theme should support:

* WordPress standard theme features
* WooCommerce support
* RTL layout
* Persian typography readiness
* Responsive design
* Product listing pages
* Product detail pages
* Cart and checkout styling
* Header with search, user/account area, cart area
* Mobile navigation
* Product cards suitable for scarf/shawl products
* Color/style variation display when possible
* Clean empty states
* Accessible buttons and links
* SEO-friendly semantic HTML

Use WordPress hooks, template parts, and WooCommerce APIs where appropriate.

Avoid large monolithic files.

Prefer this structure where useful:

```text
scarf/
  style.css
  functions.php
  index.php
  header.php
  footer.php
  screenshot.png
  assets/
    css/
    js/
    images/
  inc/
  template-parts/
```

---

## Design System Direction

The design system should be inspired by large modern e-commerce websites, especially Digikala-like UX conventions, but must remain original.

General direction:

* RTL-first layout
* Persian e-commerce feel
* Clean white/neutral surfaces
* Strong product grid
* Clear pricing hierarchy
* Discount badges
* Stock/status badges
* Sticky or prominent search on desktop/mobile when appropriate
* Filter/sidebar experience for archive pages
* Mobile-first product browsing
* Clear CTA buttons
* Soft borders and subtle shadows
* Consistent spacing scale
* Consistent radius scale
* Consistent typography scale

Do not use Digikala logo, exact colors as brand identity, exact components, exact copy, or extracted assets.

---

## Development Standards

Use:

* PHP compatible with modern WordPress hosting
* WordPress Coding Standards as much as practical
* Escaping functions:

  * `esc_html()`
  * `esc_attr()`
  * `esc_url()`
  * `wp_kses_post()`
* Translation functions:

  * `__()`
  * `_e()`
  * `esc_html__()`
  * `esc_attr__()`
* Text domain:

```text
scarf
```

All user-facing strings must be translatable.

Do not echo raw user input.

Do not trust request data.

Use nonces for forms/actions.

---

## CSS Rules

CSS should be maintainable and organized.

Recommended approach:

```text
assets/css/main.css
assets/css/woocommerce.css
assets/css/rtl.css
```

Rules:

* RTL-first.
* Avoid unnecessary CSS frameworks.
* Do not use CDN assets.
* Use CSS custom properties for design tokens.
* Avoid overly specific selectors.
* Avoid `!important` unless absolutely necessary.
* Keep responsive breakpoints consistent.
* Ensure mobile layout is not an afterthought.

Suggested token categories:

```css
:root {
  --scarf-color-primary: ;
  --scarf-color-secondary: ;
  --scarf-color-text: ;
  --scarf-color-muted: ;
  --scarf-color-border: ;
  --scarf-color-surface: ;
  --scarf-radius-sm: ;
  --scarf-radius-md: ;
  --scarf-radius-lg: ;
  --scarf-space-1: ;
  --scarf-space-2: ;
  --scarf-space-3: ;
}
```

Do not hardcode repeated values everywhere.

---

## JavaScript Rules

Use vanilla JavaScript unless there is a strong reason not to.

Do not add React/Vue/Svelte or build tooling unless explicitly requested.

JavaScript should support:

* Mobile menu
* Search interaction
* Filter toggle
* Product gallery behavior if needed
* Small UX enhancements

Rules:

* Keep JS progressive.
* Site must remain usable if JS fails.
* Avoid global pollution.
* Use event delegation where appropriate.
* Do not add external scripts/CDNs.

---

## WooCommerce Rules

Use WooCommerce hooks and template override only when necessary.

Prefer hooks and filters before copying WooCommerce templates.

If a WooCommerce template override is necessary:

1. Explain why.
2. Keep the override minimal.
3. Add a report entry.
4. Make sure compatibility risk is mentioned.

Do not create unnecessary override folders.

Do not modify WooCommerce plugin files.

---

## Plugins

Use existing reputable free plugins only if explicitly requested by the user.

Do not install plugins automatically.

If custom functionality grows too large for the theme, propose a `scart-*` plugin.

Theme should handle presentation.

Plugin should handle business logic or reusable features.

Examples of functionality better suited for plugins:

* AI try-on system
* Custom product import
* Custom user/account flows
* Advanced analytics
* Custom checkout rules
* Custom product recommendation logic

---

## Playwright MCP Usage

Playwright MCP is available and should be used when visual or browser behavior validation is relevant.

Use Playwright for:

* Checking homepage rendering
* Checking RTL layout
* Checking responsive mobile layout
* Testing navigation/menu interactions
* Testing WooCommerce archive/product/cart/checkout pages when available
* Capturing screenshots for verification
* Checking obvious console errors
* Verifying buttons, links, menus, and filter toggles

Do not use Playwright for tasks that can be solved by static code inspection only.

When using Playwright, report:

* Page tested
* Viewport tested
* What passed
* What failed
* Screenshot path if created
* Console errors if any

Suggested viewports:

```text
Desktop: 1440x900
Tablet: 768x1024
Mobile: 390x844
```

---

## Accessibility Requirements

Basic accessibility is required.

Check:

* Buttons are real `<button>` elements when they trigger actions.
* Links are real `<a>` elements when they navigate.
* Images have meaningful alt text when possible.
* Focus states are visible.
* Color contrast is reasonable.
* Menus can be navigated with keyboard where practical.
* Forms have labels.
* Icon-only buttons have accessible labels.

---

## Performance Requirements

Keep the theme lightweight.

Avoid:

* Large libraries
* External fonts from CDN
* Heavy sliders
* Unnecessary animations
* Huge JS bundles
* Loading assets globally when page-specific loading is possible

Prefer:

* Conditional asset loading
* Optimized images
* Native lazy loading
* Minimal CSS/JS
* WordPress enqueue system

---

## Security Requirements

Follow WordPress security basics:

* Escape output.
* Sanitize input.
* Use nonces.
* Use capability checks for admin actions.
* Do not expose secrets.
* Do not commit `.env`, `wp-config.php`, SQL dumps, backups, or uploads.
* Do not trust `$_GET`, `$_POST`, `$_REQUEST`, or AJAX data.

---

## Localization / Persian / RTL

The project is Persian-first.

Requirements:

* RTL layout must be treated as primary.
* User-facing strings should be Persian where the UI is custom.
* All strings must still be translatable.
* Avoid broken mixed Persian/English alignment.
* Numbers, prices, and currency areas should be visually clean.
* WooCommerce Persian translation may come from WordPress language files or plugins, not from hardcoded edits to WooCommerce core.

---

## Stage Workflow

Every task must be handled as one stage only.

Before coding:

1. Read this `AGENTS.md`.
2. Understand the requested stage.
3. Inspect only relevant files.
4. Implement only the requested scope.
5. Avoid unrelated cleanup.
6. Use Playwright MCP if visual/browser verification is relevant.
7. Provide a concise final report.

Final report format:

```markdown
## Stage Report

### What changed
- ...

### Files changed
- `path/to/file`
- `path/to/file`

### Validation
- Static checks:
- Browser/Playwright checks:
- Known limitations:

### Notes
- ...
```

If no Playwright check was needed, say why.

---

## Do Not Do

Do not:

* Build the entire project in one step.
* Add unrelated features.
* Add paid dependencies.
* Copy Digikala code/assets.
* Modify WordPress core.
* Modify WooCommerce plugin files.
* Modify third-party plugins directly.
* Introduce build tools unless requested.
* Manage Git unless explicitly requested.
* Change database content unless explicitly requested.
* Install or activate plugins unless explicitly requested.
* Make destructive filesystem changes.

---

## Current Project Intent

The user wants a reusable WordPress/WooCommerce theme for scarf and shawl shops.

Main goals:

* Professional Persian RTL storefront
* Digikala-inspired e-commerce UX
* Clean custom theme named `scarf`
* Optional custom plugins prefixed with `scart`
* Step-by-step development through OpenCode prompts
* Browser validation with Playwright MCP when useful
* No Git management by the agent

Always wait for the next explicit stage instruction.


## Available OpenCode Sub-Agents

This project may use local OpenCode sub-agents stored in:

text
.opencode/agents/

Available agents:

@scarf-wp-architect

Use for:

Planning WordPress/WooCommerce architecture
Deciding theme vs plugin responsibility
Avoiding unnecessary WooCommerce template overrides
Preparing implementation plans before coding

This agent should not edit files.

@scarf-ui-builder

Use for:

Implementing theme UI
Building RTL Persian layouts
Writing theme CSS/JS
Creating template parts
Styling WooCommerce presentation

This agent may edit files only within the requested stage scope.

@scarf-playwright-auditor

Use for:

Browser validation
RTL layout checks
Responsive testing
WooCommerce page checks
JavaScript interaction checks
Screenshot-based UI review

This agent should not edit files.

Sub-Agent Usage Rule

Use sub-agents when they clearly help the current stage.

Do not use sub-agents just for the sake of using them.

For most stages:

Ask @scarf-wp-architect for a small plan if architecture decisions are involved.
Ask @scarf-ui-builder to implement the approved stage.
Ask @scarf-playwright-auditor to validate visual/browser behavior when relevant.

The main agent remains responsible for respecting this AGENTS.md, the user request, and the current stage scope