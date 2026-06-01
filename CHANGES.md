# Zilla Capital Theme — Changes Log
**Date:** 2026-05-30  
**Theme:** Zilla Capital 30/05 trial 1

---

## 1. Font: Replaced Rotunda with Source Sans 3

**Goal:** Remove all proprietary Rotunda font references and replace with the open-source Source Sans 3 from Google Fonts.

### Files Modified

**`header.php`**
- Removed 5 Rotunda `<link rel="preload">` tags (Rotunda-Thin, Light, Regular, Medium, Bold)
- Kept the Mermaid font preload (used as decorative heading font)
- Added Google Fonts link for Source Sans 3:
  ```html
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet" />
  ```

**`style.css`**
- Removed all 14 Rotunda `@font-face` blocks (Hairline, Light, Regular, Italic, Medium, Bold, ExtraBold, Black — normal + italic variants)
- Replaced all `font-family: 'Rotunda'` rules with `'Source Sans 3', sans-serif`

**`src/sass/base/_font-face.scss`**
- Removed all 5 Rotunda @font-face blocks
- Kept only the Mermaid @font-face

**`src/sass/main.scss`**
- Added after the CSS reset:
  ```scss
  body { font-family: 'Source Sans 3', sans-serif; }
  ```

**`src/sass/widgets/grid-style-1.scss`**
- Replaced all `font-family: 'Rotunda-Light/Regular/Medium/Bold'` with Source Sans 3 equivalents

**All other `src/sass/` files (48 files scanned)**
- Replaced every occurrence of `'Rotunda-Bold'` → `'Source Sans 3', sans-serif; font-weight: 700`
- Replaced every occurrence of `'Rotunda-Medium'` → `'Source Sans 3', sans-serif; font-weight: 600`
- Replaced every occurrence of `'Rotunda-Regular'` → `'Source Sans 3', sans-serif`
- Replaced every occurrence of `'Rotunda-Light'` / `'Rotunda-light'` → `'Source Sans 3', sans-serif; font-weight: 300`
- Replaced every occurrence of `'Rotunda-Thin'` → `'Source Sans 3', sans-serif; font-weight: 100`

**Compiled CSS files — Rotunda @font-face blocks removed from:**
- `dist/css/main.css`
- `dist/css/single_post.css`
- `dist/css/single_insight.css`
- `dist/css/single-team.css`
- `dist/css/viewpoint.css`
- `dist/css/reports_insights_page.css`

**`single-reports.php`** (inline `<style>` block)
- Replaced all `font-family: 'Rotunda-*'` and `font-family: 'Rotunda'` references with Source Sans 3
- Arabic sections (`.fnar`, `.fnar *`) using `AdobeNaskh` — **left untouched**

---

## 2. Logo Fix — Navbar and Footer

**Problem:** `has_custom_logo()` returned `false`, causing the logo to render as text instead of an image.

**Fix:** Replaced the WordPress Customizer conditional block with a hardcoded `<img>` tag in both files.

**`header.php`**
```php
<a href="<?php echo site_url(); ?>" class="brand" title="<?php echo get_bloginfo('name'); ?>">
    <img src="https://www.zillacapital.com/wp-content/uploads/2026/01/cropped-zilla-capital-logo@2x.png"
         alt="<?php echo get_bloginfo('name'); ?>"
         style="max-height: 48px; width: auto;">
</a>
```

**`footer.php`**
- Same fix, with `filter: brightness(0) invert(1)` added to make the logo white on the dark footer background

---

## 3. Whitespace Reduction (~40%)

**Strategy:** Two-layer approach — global overrides in `dist/css/main.css` + direct edits to the four worst-offender widget files.

### Global overrides appended to `dist/css/main.css`
Correct class names used (verified by grepping SCSS source):

| Selector | Property | Old Value | New Value |
|---|---|---|---|
| `.banner-style-1` | padding | — | `48px 0 60px` |
| `.banner_style_2` | padding | `98px 0 179px` | `58px 0 107px` |
| `.grid-style-1` | padding | `150px 0 70px` | `60px 0 42px` |
| `.grid-style-2` | padding-top | — | `60px` |
| `.content_with_image` | padding | — | `72px 0 48px` |
| `.text-with-icon-grid` | margin-top / padding-bottom | `295px` / `205px` | `120px` / `80px` |
| `.partners` | padding | — | `64px 0` |
| `.custom_section_v1` | margin | — | `42px 0` |
| `.custom_section_v2` | padding | `94px 0 119px` | `56px 0 72px` |
| `.section_intro_v1` | margin-bottom | — | `36px` |
| `.locations` | margin-bottom | — | `36px` |
| `.track_record` | margin-top | — | `40px` |
| `.subscription_form` | margin | — | `54px 0` |

### Individual SCSS + compiled CSS files edited
- **`src/sass/widgets/text_with_icon/icon-with-text-grid.scss`** — `margin-top: 295px` → `120px`, `padding: 130px 0 205px` → `78px 0 80px`
- **`src/sass/widgets/banner-style-2.scss`** — `padding: 98px 0 179px` → `58px 0 107px`
- **`src/sass/widgets/custom-section-v2.scss`** — `padding: 94px 0 119px` → `56px 0 72px`, subtitle `margin-bottom: 127px` → `60px`
- **`src/sass/widgets/grid-style-1.scss`** — `padding-top: 100px` → `60px` (mobile), `padding: 150px 0 70px` → `90px 0 42px` (desktop)

---

## 4. Flash Note Redesign

**Context:** Flash Note is a subtype of the `reports` custom post type, identified by the presence of the `_FN_news1` ACF meta field.

### New files created

**`dist/css/flashnote.css`** — Full Flash Note component stylesheet:
- CSS custom properties: `--fn-navy`, `--fn-sky`, `--fn-bg`, `--fn-white`
- `.hero-fn` — full-width hero with dynamic `--hero-bg` CSS variable (set from PHP post thumbnail)
- `.fn-action-bar` — PDF / Spotify download buttons
- `.fn-toolbar` / `.fn-lang` — pill-shaped English/Arabic language tab switcher
- `.article-wrap` — content container with off-white background
- `.fn-section` — CSS Grid layout (image + text), `.fn-section--reverse` swaps order on alternating sections
- `.fn-figure` — 4:3 aspect-ratio image
- `.fn-audio` — WordPress audio player wrapper
- `.fn-prose[dir="rtl"]` — Arabic RTL panel preserving `AdobeNaskh` font
- `.pub-list` / `.pub-item` — related publications grid
- `.subscribe-box` / `.sub-form` — newsletter subscription section
- Responsive breakpoints at 719px and 480px

### `single-reports.php` — Complete rewrite

Branched on `$is_flash_note = !empty($FN_news1)`:

**Flash Note branch (new):**
- Hero with dynamic PHP background image via `style="--hero-bg: url('...')"`
- Action bar with PDF and Spotify links
- Language tab switcher (shown only when Arabic content exists)
- `#panel-en` — three `.fn-section` blocks with alternating image/text layout
- `#panel-ar` — Arabic RTL panel with `AdobeNaskh` preserved
- `.pub-list` related posts section
- `.subscribe-box` newsletter section
- Tab-switching JS with keyboard arrow key support

**Non-Flash Note branch (preserved):**
- Original `.page-hero` + `.article_content` layout for publications and MENA Dashboard
- All Rotunda font references removed from inline `<style>` block

### `functions.php`
- Added Flash Note stylesheet enqueue:
  ```php
  if(is_singular('reports')){
      wp_enqueue_style( 'flashnote_style', THEME_DIR_URI .'/dist/css/flashnote.css', array(), '1', 'all' );
  }
  ```
- Fixed duplicate `wp_enqueue_style` handle names in the insights block

---

## 5. Unified Designs

Appended to `dist/css/main.css`:

### Unified card style
```css
.news_article, .report_article {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(18, 38, 74, 0.08);
  transition: box-shadow 0.25s ease, transform 0.25s ease;
  background: #fff;
}
.news_article:hover, .report_article:hover {
  box-shadow: 0 6px 24px rgba(18, 38, 74, 0.15);
  transform: translateY(-3px);
}
```

### Unified button style
```css
.btn-secondary, .btn-primary, a[class*="btn-icon-arrow"] {
  font-family: 'Source Sans 3', sans-serif;
  font-weight: 600;
  letter-spacing: 0.03em;
  border-radius: 4px;
  transition: background 0.2s ease, color 0.2s ease;
}
```

### Unified section titles
```css
.section_title {
  font-size: 14px !important;
  font-weight: 700 !important;
  letter-spacing: 0.1em !important;
  text-transform: uppercase !important;
  color: #4dc8ed !important;
  margin-bottom: 8px !important;
}
.section_subtitle {
  font-size: 32px !important;
  font-weight: 700 !important;
  color: #12264a !important;
  margin-bottom: 20px !important;
  line-height: 1.2 !important;
}
```

---

## 6. Responsive Optimization — All Screen Sizes

**Breakpoints used** (Bootstrap 4, defined in `src/sass/base/_bp_variables.scss`):
- `xs`: 0px — small phones
- `sm`: 576px — large phones / landscape
- `md`: 768px — tablets
- `lg`: 992px — desktop
- `xl`: 1200px — large desktop

### Fix 1 — Mobile nav panel width
**Files:** `src/sass/components/navigation/_mobile_navigation.scss` + `dist/css/main.css`

The slide-out menu had no width set (was commented out), making it cover the full screen on mobile. Fixed with `width: min(320px, 85%)` so it slides in from the right with a dark overlay visible behind it. Also added `overflow-y: auto` so long menus scroll instead of clipping.

### Fix 2 — Team card images
**Files:** `src/sass/widgets/team_card.scss` + `dist/css/team_card.css`

Images were a hard `352×352px` with only `max-width: 100%`, meaning they became tall and narrow on small phones. Added responsive breakpoints:

| Breakpoint | Width | Height |
|---|---|---|
| `< 576px` | `100%` | `260px` |
| `576px – 991px` | `100%` | `300px` |
| `≥ 992px` | `352px` | `352px` (original) |

### Fix 3 — Internal page header tablet breakpoint
**Files:** `src/sass/widgets/internal-page-header.scss` + `dist/css/internal-page-header.css`

Added `768px–991px` breakpoint to smooth the abrupt jump from `font-size: 28px` on mobile to `55px` on desktop:
- `768px–991px`: `font-size: 40px`, `min-height: 230px`, `background-size: 80%`

### Fix 4 — Banner style 1 tablet / large-phone layout
**Files:** `src/sass/widgets/banner-style-1.scss` + `dist/css/banner-style-1.css`

The hero content wrapper was constrained to `72% / max-width: 261px / margin-left: 17%` on all non-desktop sizes, making it cramped on large phones and tablets. Added:
- `576px–991px`: content-wrapper `width: 85%`, `max-width: 420px`, `margin-left: 10%`; shield SVG scales to `max-width: 340px`
- `768px–991px`: container padding `60px 0 70px`; content-wrapper `max-width: 480px`

### Fix 5 — Section intro subtitle scaling
**Files:** `src/sass/widgets/section_intro_v1.scss` + `dist/css/section_intro_v1.css`

Added `768px–991px` breakpoint at `font-size: 40px` to bridge the 28px → 55px gap.

### Fix 6 — Global tablet + xl overrides
**File:** `dist/css/main.css` (appended)

| Component | Breakpoint | Change |
|---|---|---|
| `.container` | `< 768px` | `padding: 0 20px` always applied |
| `.section_subtitle` | `768px–991px` | `font-size: 36px` |
| `nav` | `< 576px` | `padding: 16px 0` |
| `footer` | `768px–991px` | 2-column layout, `padding: 50px 0 30px` |
| `.grid-style-2 header` | `768px–991px` | `height: 280px`, `h3` at `28px` |
| `.content_with_image .image_wrapper` | `768px–991px` | `height: 380px`, full width |
| `.track_record` | `768px–991px` | 2-column grid |
| `.partners .partner img` | `576px–767px` | `max-width: 130px` |
| `.text-with-icon-grid` | `768px–991px` | `margin-top: 80px`, `padding-bottom: 60px` |
| `.news_article img` / `.report_article img` | `768px–991px` | `height: 180px` |
| `.article_content img` | `768px–991px` | `max-height: 320px` |
| `.team_member_card .content_wrapper` | `< 576px` | `text-align: center` |
| `.section_intro_v1 .section_content *` | `≥ 1200px` | `max-width: 55%` |
| `nav .brand img` | `≥ 1200px` | `width: 160px; height: 52px` |

---

## Verification Checklist

- [ ] Homepage — logo appears as image in navbar and footer (not text)
- [ ] Footer logo — renders white on dark background
- [ ] Flash Note report — hero image, language tabs, three content sections display correctly
- [ ] Arabic Flash Note panel — RTL layout, `AdobeNaskh` font active
- [ ] Source Sans 3 loads in DevTools → Network → Fonts; no Rotunda files requested
- [ ] Pages feel noticeably more compact without looking cramped
- [ ] News/Reports cards — uniform shadow and hover lift
- [ ] `grep -r "Rotunda" dist/css/ --include="*.css" --exclude="*.map"` → zero results ✅
- [ ] Mobile nav panel slides in as a partial-width drawer (not full screen)
- [ ] Team card images scale correctly on phones < 576px
- [ ] Internal page header title scales smoothly across all screen widths
- [ ] No layout breakage between 768px–991px (tablet) on any page

---

## Constraint Respected
> **Plugin/structure freeze:** Only theme files were modified. No plugin files, WordPress core files, database settings, post types, taxonomies, widget registrations, or plugin templates (e.g., `simple_job_board/`) were touched.
