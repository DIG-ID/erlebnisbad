# Changelog

All notable changes to this theme are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/) (`MAJOR.MINOR.PATCH`).

- **MAJOR** (`1.0.0` → `2.0.0`) — structural or breaking changes (redesign, feature removal, changes requiring manual intervention).
- **MINOR** (`1.0.0` → `1.1.0`) — new features / implementations (new template, new CPT, new section).
- **PATCH** (`1.0.0` → `1.0.1`) — bug fixes and small adjustments that do not add functionality.

## [1.0.6] — 2026-07-17

### Security
- Added `inc/security.php`: disables XML-RPC and pingback, blocks REST API user
  enumeration, author archive enumeration and oEmbed author leakage, disables
  front-end search, removes users from core sitemaps, enforces generic login
  errors, disables application passwords, and sends HTTP security headers
  (X-Frame-Options, X-Content-Type-Options, Referrer-Policy,
  Permissions-Policy, HSTS on SSL).

## [1.0.5] — 2026-07-17

### Changed
- Contact map default zoom reduced to 12 (desktop) and 10 (mobile) for a wider
  area view on the Arrival & Contact page.

## [1.0.4] — 2026-07-14

### Fixed
- Intro section icons no longer appear blank on mobile: excluded from WP Rocket
  LazyLoad (`data-no-lazy` + eager) so they load without waiting for delayed JS.
- Spotlights images excluded from WP Rocket LazyLoad so the pinned section is
  measured at the correct height without needing a resize.

## [1.0.3] — 2026-07-14

### Fixed
- Spotlights section pinned height: refresh ScrollTrigger once the panel images
  have loaded, so the pin spacer is measured correctly with WP Rocket lazyload
  and delayed JS (previously the section only sized correctly after a resize).

## [1.0.2] — 2026-07-13

### Added
- reCAPTCHA badge hidden site-wide; shown only on the Arrival & Contact page
  (`page-templates/page-arrival-contact.php`).
- CF7 scripts and styles conditionally loaded on the contact page only.
- WPML string registration for translatable section anchors (`angebot`,
  `besonderes-erlebnis`, `kursangebot`) centralised in the `init` hook.

## [1.0.1] — 2026-07-13

### Changed
- Login screen layout: vertically stacked and centred content on the dark
  gradient background.

### Removed
- Redundant inline login-logo CSS (`erlebnisbad_login_logo()` / `login_head`);
  the logo is now handled by the compiled login stylesheet.

## [1.0.0] — 2026-07-13

Initial production release.

### Added
- Custom admin dashboard stylesheet (`dist/css/admin-dashboard.css`), enqueued on
  `admin_enqueue_scripts` for wp-admin screens only.
- Modular login/admin SASS structure under `assets/sass/_admin/`
  (`vars`, `login`, `login-forms`, `login-notices`, `login-actions`, `dashboard`).
- digid brand colours in the Tailwind palette (turquoise, light-grey, pink, black, grey).

### Changed
- Login and admin stylesheets now use `erlebnisbad_asset_version()` for cache-busting
  instead of the theme version.
