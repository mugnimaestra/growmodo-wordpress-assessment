# Estatein WordPress Theme — Technical Documentation

## Implementation overview

This assessment uses a custom WordPress theme built from the Estatein Figma reference. The implementation does not use a page builder or a large plugin stack. It uses WordPress templates, a custom post type, post meta, native query hooks, and small theme JavaScript.

The required routes are:

- `/`
- `/about/`
- `/properties/`
- `/property/seaside-serenity-villa/`
- `/services/`
- `/contact/`

The theme source is in `wordpress/theme/`. Shared layout and component styling is in `style.css`, behavior is in `assets/js/theme.js`, and page-specific markup is kept in normal WordPress template files. The implementation uses reusable template parts for property cards and shared PHP helpers for routes, section pagers, metadata, forms, and demo-content setup.

## WordPress content model

Properties use the native `estatein_property` custom post type. Property details such as location, type, price, bedrooms, bathrooms, area, build year, and the visual selection are stored as WordPress post meta. This keeps the data editable in WordPress and avoids adding a plugin only to provide fields that the assessment can support directly.

The property archive uses the main WordPress query plus `pre_get_posts` for filtering. Supported filters are free-text search, location, property type, minimum price, property size, and build year. The build-year request parameter is `build_year` because `year` is a reserved WordPress query variable and would otherwise trigger WordPress date-archive canonical redirects. Archive ordering is deterministic so the reference properties remain in a stable order.

The theme activation hook creates a small editable demo data set and configures the required pages and front page. This makes a fresh WordPress installation reviewable without a manual content-import step.

## Plugins and tools used

**WordPress plugins:** no assessment-specific plugin is required. There is intentionally no custom plugin file or `plugins/` directory in this repository. The functionality that belongs to this assessment theme is implemented with native WordPress APIs in `wordpress/theme/functions.php`.

- **ACF:** not used. Property fields use native WordPress post meta because the field set is small and does not need an extra dependency.
- **Contact-form plugin:** not used. Contact inquiries, property inquiries, and newsletter signups use WordPress `admin-post.php`, nonce validation, sanitization, email validation, and a private `estatein_inquiry` post type for persistence.
- **CPT plugin:** not used. The `estatein_property` and `estatein_inquiry` post types are registered by the theme.
- **Page builder:** not used. The six required pages are normal WordPress templates in the custom theme.

**Development and review tools:** the supplied Figma Community design was the visual reference; Chrome/DevTools was used for responsive and interaction verification; `php -l` and `node --check` were used for syntax validation; Git and GitHub provide source control; and Wasmer provides the final free WordPress hosting environment.

This keeps the submission self-contained: activating the theme is sufficient for the assessment features, without requiring a reviewer to install or configure additional plugins.

## Responsive and Figma implementation

The implementation follows the desktop, laptop, and mobile Figma frames rather than scaling one desktop layout proportionally. The main reference widths are 1920 px, 1440 px, and 390 px. Shared components use responsive CSS, while page-specific geometry is scoped to the relevant template so a correction on one page does not change previously validated pages.

The final structural browser measurements match the reference frame heights at all three widths:

| Page | 1920 px | 1440 px | 390 px |
| --- | ---: | ---: | ---: |
| Home | 5196 px | 4074 px | 4882 px |
| About Us | 6022 px | 4931 px | 8030 px |
| Properties | 4381 px | 3347 px | 4795 px |
| Property Details | 7739 px | 6086 px | 7425 px |
| Services | 4522 px | 3672 px | 5945 px |
| Contact | 5180 px | 4058 px | 5078 px |

Where the native Figma integration was unavailable, the public Figma Community canvas checkpoint was inspected through the approved Chrome/DevTools workflow and parsed locally to recover top-level frame geometry. The theme uses the recovered reference hero/property imagery rather than CSS-only image placeholders for the primary property visuals. The four exact PNG assets are stored under `assets/images/`; the theme no longer depends on temporary signed Figma URLs.

## Forms, persistence, accessibility, and security

Contact inquiries and property inquiries are submitted through `admin-post.php`. The handlers verify WordPress nonces, sanitize text inputs, validate email addresses, and save submissions as private `estatein_inquiry` posts. Newsletter signups use the same persistent inquiry model with a separate nonce-protected handler. A local runtime test confirmed that valid contact, property-inquiry, and newsletter submissions each create one record, while an invalid email creates none.

The theme includes a skip link, visible keyboard focus styles, semantic navigation and form labels, mobile-menu `aria-expanded` state, Escape-to-close behavior with focus restoration, and reduced-motion handling. The announcement banner has an accessible dismiss button. These are practical accessibility measures; this assessment does not claim formal WCAG conformance.

Frontend output is escaped with WordPress helpers where appropriate. Request data is sanitized before storage or query use. Form actions use nonce verification. No credentials or secrets are stored in the theme.

## Setup and validation

For a local WordPress installation, place the `theme` directory in `wp-content/themes/estatein-assessment` (or rename the directory to `estatein-assessment`), then activate **Estatein Assessment** in WordPress. Activation seeds the demo pages/properties and configures the front page. Use normal WordPress pretty permalinks so the required page and property routes resolve as shown above.

Validation completed on the local WordPress runtime and the final public deployment with WordPress 7.1 and PHP 8.3. All theme PHP files pass `php -l`, and `assets/js/theme.js` passes `node --check`. All six public routes return HTTP 200. Chrome checks covered the 1920/1440/390 reference states plus a 768 px tablet smoke. The tablet smoke exposed horizontal overflow on three pages; a tablet-only CSS correction removed that overflow on all six routes without changing the locked reference-width geometry. Chrome validation also covered archive filters, route links, visible keyboard focus, mobile-menu open/close/Escape behavior with focus restoration, announcement dismissal, form persistence, invalid-email handling, and console errors/warnings on the checked critical flow. Home and Property Details were re-measured after the final source changes and retained all validated reference heights exactly.

Firefox 152 is installed but could not be tested because the environment killed even a headless blank-page Firefox process before rendering. Safari 18.6 is installed, but SafariDriver reported that remote automation is disabled in Safari settings. Microsoft Edge is not installed. Those three browser checks remain unresolved; no coverage is claimed for them.

## Deployment and limitations

A zero-cost Wasmer Hobby WordPress instance is active at:

`https://growmodo-estatein.wasmer.app/`

The Wasmer account verification requirement has been completed. After a dashboard reload, the application reported `Ready` and the temporary expiry warning was absent. No paid resource or credit card was used. The final theme upload contains local hero/property PNG assets, all six public routes return HTTP 200, and the public active stylesheet contains no signed Figma or checkpoint references. Public contact, property-inquiry, and newsletter submissions were verified as persistent private WordPress inquiry records; an invalid-email submission created no record.

Main trade-offs are deliberate: the theme uses native CPT/meta instead of a field plugin, uses a small seeded data set instead of a content-import dependency, and prioritizes the required Figma routes and behavior over extra plugin architecture. The supplied reference widths have exact structural measurements; the additional 768 px tablet check verifies usable intermediate responsive behavior without claiming a separate Figma reference frame.