# nightglassadvisory.com

Website for Nightglass Advisory: fractional CTO and CISO for founder-led companies.

Built with [Jigsaw](https://jigsaw.tighten.com) and Tailwind CSS 4. Deployed on Netlify (`netlify.toml`).

## Build

```sh
composer install
npm install
npm run prod        # Vite + Jigsaw production build -> build_production/
```

No local PHP? `npm run local:composer` once, then `npm run local:prod` (runs PHP in a podman container via `bin/php`).

## Licensing

Site copy, images and structured data: © Nightglass Advisory. All rights reserved.

Layout and components are adapted from [Tailwind Plus](https://tailwindcss.com/plus) (the "Studio" template and marketing components) under its license, which permits use in this end product only. They are not offered for reuse or redistribution. Mona Sans is © GitHub, used under the SIL Open Font License.
