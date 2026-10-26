# Thread & Form — Luxury Fashion WordPress Theme

[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-21759B?logo=wordpress&logoColor=white)](https://wordpress.org/)
[![Full Site Editing](https://img.shields.io/badge/FSE-Block%20Theme-000000)](https://developer.wordpress.org/block-editor/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4-38BDF8?logo=tailwindcss&logoColor=white)](https://tailwindcss.com/)
[![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![License: GPL v2](https://img.shields.io/badge/License-GPLv2-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)
[![SEO](https://img.shields.io/badge/SEO-Schema.org%20JSON--LD-orange)](#built-in-seo--core-web-vitals-architecture)

> **Thread & Form** is an architectural, high-end fashion and lifestyle WordPress block theme designed for luxury ateliers, bespoke garment makers, and contemporary multi-page editorial brands.

Crafted with a warm mineral aesthetic, tactile linen grain overlay, fluid glassmorphic sticky navigation, and high-performance native Tailwind CSS architecture.

---

## Highlights

- **Atelier Visual Aesthetic**: Designed with an editorial balance of high-contrast serif typography (*Playfair Display*) and refined contemporary grotesque sans (*Plus Jakarta Sans*), anchored by a palette of warm bone (`#fbfaf7`), sand (`#f2eee7`), architectural ink (`#11141a`), and terracotta accent (`#b36b43`).
- **Sticky Glassmorphic Navigation**: Smooth `position: sticky` header with ambient frosted-glass backdrop blur (`backdrop-filter: blur(20px)`), integrated cart badge trigger, wishlist counter, and an auto-collapsing announcement bar that gracefully slides out of view during scroll.
- **Full-Screen Morphing Mobile Drawer**: Accessible mobile navigation with animated hamburger-to-cross transformation, tactile touch targets, and slide-in drawer choreography.
- **Enterprise-Grade Built-in SEO**: Zero-dependency Schema.org JSON-LD Knowledge Graph (`ClothingStore`, `Brand`, `WebSite`, `BreadcrumbList`, and `BlogPosting`), dynamic Open Graph, Twitter Large Cards, canonical URLs, and Core Web Vitals LCP image preloading.
- **Responsive & Lightweight**: 0 horizontal layout overflow across all viewports (320px mobile to 1920px ultrawide). Built without jQuery or heavy JavaScript animation frameworks.
- **Full Site Editing (FSE)**: Native Gutenberg block patterns and HTML block templates. Customize typography, spacing, and colors directly inside the WordPress Site Editor (`Appearance > Editor`).
- **Optional WooCommerce Support**: Ready for luxury commerce. Includes stylized templates and patterns for product showcases, quick-view modals, cart slide-outs, and checkout.

---

## Built-in SEO & Core Web Vitals Architecture

Thread & Form includes an autonomous SEO engine in `inc-seo.php` that adheres to Google Search Central guidelines:

| Feature | Implementation | Benefit |
| :--- | :--- | :--- |
| **Title Architecture** | `document_title_parts` filter with luxury em-dash (`—`) | Clean, branding-focused SERP titles without truncation |
| **Meta Description** | Contextual generator with 150–160 character limit | High click-through rate (CTR) on Google search snippets |
| **Canonical URLs** | Self-referencing canonical generator for all views | Eliminates duplicate content penalties |
| **Social Graph** | Full Open Graph + Twitter `summary_large_image` | Rich visual previews on iMessage, Slack, LinkedIn, WhatsApp, X |
| **Schema.org JSON-LD** | Multi-type `@graph` (`ClothingStore`, `Brand`, `WebSite`) | Eligible for Google Knowledge Panels and Sitelinks Searchbox |
| **Robots Directives** | Smart `noindex, follow` on search/404, `max-image-preview:large` on posts | Optimizes Google crawl budget and enables Discover inclusion |
| **LCP Preload** | `<link rel="preload" as="image" fetchpriority="high">` on front-page hero | Guarantees top Core Web Vitals LCP rendering speeds |
| **Third-Party Safe** | Automatic detection of Yoast, RankMath, SEOPress, AIOSEO | Yields meta tag output automatically to prevent duplicate tags |

---

## Page Templates & Included Block Patterns

The theme provides a complete multi-page flagship experience out of the box:

- **Homepage (`front-page.html`)**: Atelier hero section, press quotes carousel, infinite textile marquee, curated garment grid with quick-view modals, material provenance breakdown, core studio values, lookbook editorial visual essay, journal highlights, and newsletter subscription banner.
- **Collection (`page-collection.html`)**: Filterable lookbook and garment catalog with material tags, pricing, and sizing tags.
- **Our Story / About (`page-about.html`)**: Studio philosophy, Porto milling heritage, craftsmanship timeline, and artisan portraiture.
- **Journal (`page-journal.html` / `single.html`)**: Editorial blog archive and single-post layouts with typography calibrated for comfortable reading.
- **Size Guide (`page-size-guide.html`)**: Interactive unit converter (Centimeters / Inches) and measurement tables.
- **Shipping & Returns (`page-shipping-returns.html`)**: International transit times, carbon-neutral shipping details, and 30-day exchange policies.
- **Contact (`page-contact.html`)**: Atelier appointment booking details, concierge contact email, and studio address in Porto.
- **Search & 404 (`search.html` / `404.html`)**: Refined search result listings and minimalist 404 error page.

---

## Tech Stack

- **Platform**: WordPress 6.0+ (Full Site Editing / Block Theme)
- **Styling**: Tailwind CSS v4 + Vanilla CSS Custom Properties
- **Typography**: Playfair Display (Serif) & Plus Jakarta Sans (Sans-serif) via Google Fonts
- **Scripts**: Modern Vanilla JavaScript (ES6+, Intersection Observer, zero dependencies)
- **Tooling**: Node.js, `@tailwindcss/cli`, PostCSS, Autoprefixer

---

## Quickstart & Installation

### Option 1: Direct WordPress Installation

1. Clone or download this repository into your WordPress themes directory:
   ```bash
   cd wp-content/themes/
   git clone https://github.com/<YOUR_USERNAME>/<REPO_NAME>.git thread-and-form
   ```
2. Navigate to your WordPress Admin dashboard: **Appearance > Themes**.
3. Click **Activate** on **Thread & Form**.
4. Navigate to **Appearance > Thread & Form Setup** and click **Create sample pages** to automatically generate all 7 flagship pages (`/collection/`, `/about/`, `/journal/`, `/size-guide/`, `/shipping-returns/`, `/contact/`, and the front page).

---

### Option 2: Local Development with Tailwind CSS

1. Install project dependencies:
   ```bash
   npm install
   ```
2. Start the Tailwind CSS file watcher:
   ```bash
   npm run dev:css
   ```
3. To compile minified CSS for production:
   ```bash
   npm run build:css
   ```

---

## Project Structure

```text
thread-and-form/
├── assets/
│   ├── css/
│   │   ├── src/
│   │   │   └── input.css          # Tailwind CSS v4 design tokens and directives
│   │   ├── tailwind.css           # Compiled Tailwind utility classes
│   │   └── theme.css              # Custom luxury components, animations & layout
│   ├── images/                    # Atelier lookbook, garment comps & textures
│   └── js/
│       └── theme.js               # Header scroll, mobile drawer, modals, unit toggle
├── inc-seo.php                    # Schema.org JSON-LD, Open Graph, meta tags & LCP engine
├── inc-setup.php                  # One-click sample page provisioner & admin notice
├── parts/                         # Block template parts (header.html, footer.html)
├── patterns/                      # Gutenberg Block Patterns (hero, story, lookbook, etc.)
├── templates/                     # Block templates (front-page, single, 404, collection, etc.)
├── functions.php                  # Theme setup, asset enqueuing, and hooks
├── theme.json                     # FSE style settings, spacing presets, color palette
├── package.json                   # Build scripts & npm configuration
└── README.md                      # Documentation
```

---

## Design System Tokens

Defined in `theme.json` and `assets/css/src/input.css`:

```css
--color-tf-ink:         #11141a;   /* Primary typography & high contrast borders */
--color-tf-bg:          #fbfaf7;   /* Atelier warm bone paper background */
--color-tf-bg-card:     #ffffff;   /* Pure white card elevation */
--color-tf-sand:        #f2eee7;   /* Secondary surface and pill badges */
--color-tf-muted:       #5c6773;   /* Secondary editorial typography */
--color-tf-line:        #e5e0d8;   /* Subtle hairline dividers */
--color-tf-accent:      #b36b43;   /* Porto terracotta accent */
--color-tf-accent-soft: #fbf2ed;   /* Soft terracotta highlight */
```

---

## License

Distributed under the **GNU General Public License v2 or later**. See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html) for details.
