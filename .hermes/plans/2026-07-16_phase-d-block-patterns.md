# Phase D: Block Patterns — Scarf Theme

> **For Hermes:** Implement block patterns for Gutenberg editor.

**Goal:** Register block pattern categories + 7 reusable patterns in Gutenberg.

**Architecture:**
- New file: `inc/block-patterns.php` — register categories + patterns
- Modify: `functions.php` — require the new file
- Modify: `assets/css/main.css` — add editor-specific pattern styles

---

## Task 1: Create `inc/block-patterns.php`

Register categories and patterns using WordPress Block Patterns API.

## Task 2: Require from functions.php

Add `require_once` for block-patterns.php.

## Task 3: Add editor CSS

Add styles visible in the block editor for patterns.

## Task 4: Verify

Check patterns appear in Gutenberg pattern browser.
