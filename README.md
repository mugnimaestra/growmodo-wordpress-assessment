# Growmodo WordPress Assessment — Estatein

Custom WordPress theme implementation of the supplied Estatein Figma design for the Growmodo WordPress technical assessment.

## Deliverables

- Live demo: `https://growmodo-estatein.wasmer.app/`
- Theme source: `wordpress/theme/`
- Technical documentation: `documentation/technical-documentation.md`
- Deployment notes: `deployments/wasmer.md`
- Final requirement audit: `FINAL-AUDIT.md`

## Theme setup

Copy `wordpress/theme/` to `wp-content/themes/estatein-assessment` and activate **Estatein Assessment** in WordPress. Theme activation creates the required editable pages and demo property records. Use normal WordPress pretty permalinks.

The theme uses native WordPress CPT/meta and form handlers; no page builder, ACF dependency, or contact-form plugin is required for the assessment features.

## Validation summary

The final deployment runs WordPress 7.1 and PHP 8.3. All six required public routes return HTTP 200. PHP syntax checks and the theme JavaScript syntax check pass. Chrome validation covers the 1920/1440/390 Figma reference widths plus a 768 px tablet smoke. Exact recovered hero/property PNG assets are stored locally under the theme and no expiring signed Figma URLs remain in the source.

See `documentation/technical-documentation.md` and `FINAL-AUDIT.md` for detailed evidence and the factual cross-browser limitations.
