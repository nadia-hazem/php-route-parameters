# PHP Route Parameters

Part of the **PICTELLE PHP Starters** collection.

Built on top of the **PHP View Engine**.

This project extends the router so that a single route can describe a whole family of URLs. Route parameters such as `{id}` are captured from the URL and passed directly to the controller.

---

## Features

- Built on top of PHP View Engine
- Modern PHP 8+
- Dynamic routes with parameters (`/users/{id}`)
- Multiple parameters per route (`/posts/{slug}/comments/{id}`)
- Parameters passed to controllers as named arguments
- Works with controllers and anonymous functions
- Static routes and 404 handling preserved
- Output escaped with `htmlspecialchars()`
- PSR-4 autoloading
- Vanilla PHP (no framework)

---

## Project Structure

```text
php-route-parameters/
│
├── public/
│   └── index.php
│
├── routes.php
│
├── src/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   └── UserController.php
│   ├── Core/
│   │   ├── Controller.php
│   │   └── Router.php
│   └── Views/
│       ├── pages/
│       └── partials/
│
├── vendor/
├── composer.json
└── README.md
```

---

## Requirements

* PHP 8.2 or higher
* Composer
* Apache (or equivalent web server)

---

## Installation

Clone the repository

```bash
git clone https://github.com/nadia-hazem/php-route-parameters.git
```

Install dependencies

```bash
composer install
```

Configure your local web server so that the **public/** directory is the document root.

---

## How it works

Routes can contain parameters written between braces:

```php
$router->get('/users/{id}', [UserController::class, 'show']);
```

When a request comes in, the router:

- extracts the parameter names from the route (`id`)
- converts the route into a regular expression (`/users/([^/]+)`)
- compares it with the requested URL
- captures the values found in the URL (`42`)
- combines names and values (`['id' => '42']`)
- passes them to the controller as named arguments

The controller simply declares what it expects:

```php
public function show(string $id): void
```

Routes without parameters work exactly as before, and unknown URLs still return a 404 response.

---

## Philosophy

This project intentionally keeps the router simple.

Instead of relying on an external routing library, it shows how dynamic routing can be built with native PHP and a few well-chosen functions: `preg_match()`, `preg_match_all()` and `array_combine()`.

The objective is to understand how a URL becomes data for the controller before introducing more advanced features such as parameter constraints or named routes.

---

## Roadmap

### Foundation Series

* ✅ #1 MVC Starter

* ✅ #2 CRUD

* ✅ #3 View Engine

* ✅ #4 Route Parameters

---------------------

### Advanced Series

* ⬜ Authentication

* ⬜ Dashboard

* ⬜ Upload Images

* ⬜ Search & Autocomplete

* ⬜ Pagination

* ⬜ Membership

* ⬜ Calendar

* ⬜ Reservation

* ⬜ Comments
---

## Learning Goals

This repository is part of a collection of educational templates built for **Pictelle**, an independent digital craft workshop.

Each template focuses on understanding a specific aspect of web development while remaining practical enough to be reused in real projects.

---

## License

MIT License.
