# Yibera — Hospital Management System

A PHP (MySQLi) hospital management system organised with a small, hand-rolled
**MVC** architecture. Every request enters through a single front controller
(`index.php`), which routes to a controller, which uses models for data access
and renders views inside shared layouts.

## Project structure

```
hospital/
├── index.php                 # Front controller (bootstrap + dispatch)
├── config/
│   ├── config.php            # BASE_URL, paths, error settings
│   └── database.php          # DB credentials (returns an array)
├── app/
│   ├── routes.php            # page key  ->  [Controller, method]
│   ├── core/
│   │   ├── Database.php       # shared MySQLi connection + query helpers + migrate()
│   │   ├── Router.php         # dispatches a page key to a controller
│   │   ├── Controller.php     # base controller (render() with layouts)
│   │   ├── Auth.php           # admin session helpers
│   │   └── helpers.php        # e(), url(), asset(), redirect(), flash(), calculateAge()...
│   ├── models/
│   │   ├── AdminUser.php
│   │   ├── Patient.php        # patients double as appointments (Status = pending)
│   │   ├── Staff.php
│   │   └── Medication.php
│   ├── controllers/
│   │   ├── public/   Home, About, Services, Contact, Appointment
│   │   ├── auth/     Auth (login / logout)
│   │   └── admin/    Dashboard, Patient, Staff, Pharmacy, Report, Setting
│   └── views/
│       ├── layouts/   public.php, admin.php
│       ├── partials/  head, nav, footer, admin-sidebar, admin-header
│       ├── public/    home, about, services, contact, book-appointment
│       ├── auth/      login
│       └── admin/     dashboard, patients/*, staff/*, pharmacy/*, reports, settings
├── dist/output.css           # compiled Tailwind CSS
├── src/input.css             # Tailwind source
├── images/                   # static images
└── package.json, tailwind.config.cjs, ...   # front-end build
```

## How requests flow

1. The browser hits `index.php?page=<route>` (e.g. `?page=admin/patients/view`).
2. `index.php` boots config, starts the session, registers the autoloader,
   runs the one-time DB migration, then hands `<route>` to the `Router`.
3. The `Router` looks the route up in `app/routes.php` and calls the mapped
   controller method.
4. The controller validates input, talks to models, and calls
   `$this->render('view/name', $data, 'layout')`.

Links are always built with the `url()` helper and assets with `asset()`, so
the app does not depend on the directory it is opened from.

## Running it (XAMPP)

1. Copy/clone this `hospital` folder into `C:\xampp\htdocs\` so it is reachable
   at **http://localhost/hospital/**.
2. Start **Apache** and **MySQL** from the XAMPP control panel.
3. Visit **http://localhost/hospital/**. On first load the app automatically
   creates the `hospitaldb` database, the tables, and a default admin account.

The base URL is **auto-detected from the request**, so the app works wherever
you put it — `http://localhost/`, `http://localhost/hospital/`,
`http://localhost/hospital/hospital/`, a virtual host, etc. (CSS, images and
links all adapt). You only need to touch `BASE_URL` in
[config/config.php](config/config.php) if you want to force a specific value.
DB credentials live in [config/database.php](config/database.php).

### Rebuilding the CSS (Tailwind)

Styles are compiled from [src/input.css](src/input.css) to
[dist/output.css](dist/output.css). The page links the compiled file, so you
only need to rebuild after changing markup/classes:

```bash
npm install        # first time, or if the toolchain was installed on another OS
npm run build:css  # one-shot build  (npm run watch:css to rebuild on save)
```

> The build uses a small PostCSS runner (`scripts/build-css.cjs`) instead of the
> Tailwind v4 CLI, because the CLI pulls in `@parcel/watcher`, whose native
> Windows binary is often missing. If colours/spacing look unstyled, run
> `npm install` (to fetch the Windows-native `@tailwindcss/oxide` and
> `lightningcss` binaries) and then `npm run build:css`.

### Default admin login

| Username | Password   |
|----------|------------|
| `admin`  | `admin123` |

Reach the login screen at **http://localhost/hospital/index.php?page=admin-login**.

## Notes on what changed during the refactor

- The reported `header.php` error ("Undefined array key `user_type`") was caused
  by a session-key mismatch: login set `admin_*` keys while the header read
  `user_*` keys. Auth state is now centralised in `Auth` and the navigation is
  consistent.
- The public appointment form previously wrote to `person`/`address` tables that
  were never created, so booking failed. Bookings now persist to the canonical
  `patient` table as a `pending` row.
- All database access uses **prepared statements** (the original admin forms
  built SQL by string concatenation).
- Broken/duplicate pages were consolidated: the staff "Add Employee" form (which
  posted to a non-existent script) now uses the staff register form, and the
  pharmacy `medications`/`add-category` pages (which called PDO methods on a
  MySQLi handle) were fixed.

## Design

- The CSS build was repaired (see "Rebuilding the CSS") and recompiled against
  the new `app/views` structure.
- All **gradients were replaced with solid colours**, and every corner radius is
  now `rounded-md` (circular avatars/badges keep `rounded-full`).
- Global base styles live in [src/input.css](src/input.css): the Raleway font,
  a fluid responsive base font-size, balanced headings, smooth scrolling and
  accessible focus rings — applied site-wide. It also defines reusable
  `.btn-*`, `.card`, `.form-input` and `.badge` component classes.
- The admin area is now responsive: the sidebar collapses into an off-canvas
  drawer with a hamburger toggle on small screens.
