# Laravel Blade Conversion

## Overview
This package includes a Laravel controller, route definitions, and form handling for converting a static HTML template into a dynamic Laravel Blade project.

---

## 1. Setup a New Laravel Project
To get started:

1. Install Laravel via Composer:
   ```bash
   composer create-project laravel/laravel blog-template
   cd blog-template
   ```
2. Serve the project locally:
   ```bash
   php artisan serve
   ```
3. Your Laravel app will be available at:
   ```
   http://127.0.0.1:8000
   ```

4. Place the Blade templates and components in:
   ```
   resources/views/
   ```

5. Copy CSS and JS assets to:
   ```
   public/css/
   public/js/
   ```
6. In Laravel, we can generate a controller with Artisan using the following command::
   ```
    - php artisan make:controller PageController
   ```
---

## 2. Approach
1. **Blade Layout (`layouts/app.blade.php`)**
   - Holds the main HTML structure and includes `@yield('content')`.
   - Header, navigation, and footer are included with `@include`.

2. **Blade Components**
   - `resources/views/components/` contains `header`, `nav`, and `footer` components.
   - This removes duplication and centralizes common UI elements.

3. **Dynamic Pages**
   - Each HTML page converted to a Blade file:
     - `index.blade.php`
     - `categories.blade.php`
     - `profile.blade.php`
     - `login.blade.php`
     - `register.blade.php`
     - `single-blog.blade.php`
   - Each page extends the layout using `@extends` and defines a `@section('content')`.
  
4. **Form Handling**
   - `PageController` handles the `register` form with:
     - CSRF protection (`@csrf`)
     - Validation
     - Session-based success messages

5. **Assets**
   - CSS and JS moved to `public/css` and `public/js`.
   - Linked using Blade's `asset()` helper.

---

## 3. Blade Features Used
- `@extends` and `@section` for layouts
- `@yield` to define dynamic content sections
- `@include` to reuse partials (header, nav, footer)
- `@csrf` for secure form submission
- Session flash messages with `session('success')`
- Validation error handling with `$errors->any()` and `$errors->all()`

---

## 4. Usage
1. `PageController.php` to `app/Http/Controllers/`.
2. `web.php` content into `routes/web.php`.
3. Blade files in `resources/views/`.
4. Serve the project:
   ```bash
   php artisan serve
   ```
## 5. Login and Logout
   
   - User logs in with demo@example.com / password123

   - Session stores user = John Doe

   - Redirect to /welcome shows: “Welcome, John Doe!”

   - Clicking Sign Out clears the session and redirects to login page

