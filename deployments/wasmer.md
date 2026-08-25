# Wasmer deployment

- Host: Wasmer WordPress on the Hobby plan
- Cost selected: $0 / free Hobby plan
- Public URL: `https://growmodo-estatein.wasmer.app/`
- WordPress: 7.1
- PHP: 8.3
- Theme: Estatein Assessment, uploaded and activated through WordPress Admin

## Public validation performed

After the final theme update and asset localization, these public routes returned HTTP 200:

- `/`
- `/about/`
- `/properties/`
- `/property/seaside-serenity-villa/`
- `/services/`
- `/contact/`

The final public validation also confirmed the localized hero/property PNG files return HTTP 200, the active stylesheet contains no temporary signed Figma/checkpoint references, archive search and all six filters return the expected seeded result counts, and the 768 px Chrome tablet smoke has no horizontal overflow on any required route. Contact, property-inquiry, and newsletter submissions persist as private WordPress inquiries; an invalid-email submission creates no record.

## Account verification status

Account verification is complete. After reloading the Wasmer app overview, the application status was `Ready` and the temporary expiry/verification warning was absent. The deployment remains on the free Hobby plan. No credit card or paid resource was used.

Browser coverage is factual: Chrome was tested at desktop, laptop, mobile, and an intermediate 768 px tablet width. Firefox testing remains unresolved because the installed browser process is killed by the environment before rendering; Safari testing remains unresolved because Safari remote automation is disabled; Microsoft Edge is not installed.