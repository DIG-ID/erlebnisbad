# Changelog

All notable changes to this theme are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/) (`MAJOR.MINOR.PATCH`).

- **MAJOR** (`1.0.0` → `2.0.0`) — structural or breaking changes (redesign, feature removal, changes requiring manual intervention).
- **MINOR** (`1.0.0` → `1.1.0`) — new features / implementations (new template, new CPT, new section).
- **PATCH** (`1.0.0` → `1.0.1`) — bug fixes and small adjustments that do not add functionality.

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
