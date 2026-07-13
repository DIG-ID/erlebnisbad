# Changelog

All notable changes to this theme are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
