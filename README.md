# LaravelCommerce

LaravelCommerce is an online store application built on Laravel 11, with a customer storefront and an admin panel, for developers and agencies who need a customizable e-commerce codebase to start from.

## Overview

The application covers the retail workflow end to end: a product catalog with attributes (cost price, promo price, stock, size), cart, wishlist, coupons, product reviews, order tracking, and PDF invoice generation.

It also includes social login through Laravel Socialite (Facebook, Google, Twitter), real-time notifications and messaging through Pusher, newsletter management, role-based access control, and blog/CMS pages. Layouts are RTL-aware with Persian language support, so the same codebase serves LTR and RTL stores. Payments go through PayPal.

## Features

### Storefront

- Responsive design for desktop, tablet, and mobile
- Cart, wishlist, and product reviews with multi-level comments
- Coupons and discounts, plus product attributes (cost price, promo price, stock, size)
- Blog and CMS: categories, tags, content pages
- Modules for shipping, payment, and discounts
- SEO-friendly URLs and product search
- Newsletter management via Spatie Newsletter
- Real-time contact forms and notifications via Pusher
- Related products and per-category recommendations
- Social login with Laravel Socialite (Facebook, Google, Twitter)
- Social sharing and follow links
- PayPal payment integration and order tracking

### Admin panel

- Roles and permissions for admins
- Product, category, brand, and shipping management
- Media manager powered by UniSharp Laravel File Manager
- Banner management and order management
- Review management and blog/category/tag management
- User and coupon management
- System configuration: email settings, store info, maintenance mode
- Line and pie charts for analytics
- PDF order generation via DomPDF
- Real-time messages and notifications

### Customer dashboard

- Order management
- Review management
- Profile settings

## Requirements

- PHP 8.x with Composer
- MySQL
- Node.js and npm for frontend assets

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/morpheusadam/LaravelCommerce.git
cd LaravelCommerce

# 2. Install PHP & JS dependencies
composer install
npm install

# 3. Create your environment file
cp .env.example .env

# 4. Generate the application key
php artisan key:generate

# 5. Configure database (and SMTP / PayPal / Pusher) credentials in .env
```

### Database and assets

```bash
# Import the provided database dump
# (e.g. database/e-shop.sql) into your MySQL database

# Link storage and build assets
php artisan storage:link
npm run dev

# Serve the application
php artisan serve
```

## Usage

Open `http://localhost:8000` in a browser. The admin panel is at `/admin`.

Set SMTP, PayPal, and Pusher credentials in `.env` to enable email, payments, and real-time features. Registration and login rely on email, so SMTP must be configured for accounts to work.

## Tech stack

| Layer | Technologies |
| --- | --- |
| Backend | Laravel 11, PHP, Laravel Sanctum, Tinker, Laravel UI |
| Frontend | Blade, Vue 2, Bootstrap, jQuery, Sass, Laravel Mix |
| Realtime | Pusher, Laravel Echo |
| Payments | srmklive/paypal |
| Media and PDF | UniSharp Laravel File Manager, Intervention Image, Barryvdh DomPDF |
| Auth and social | Laravel Socialite (Facebook, Google, Twitter) |
| Marketing | Spatie Laravel Newsletter |

## Project structure

```text
LaravelCommerce/
├── app/
│   ├── Http/Controllers/   # Product, Cart, Order, Admin, Auth, Post...
│   ├── Models/             # Product, Category, Brand, Order, Coupon...
│   ├── Events/             # MessageSent (realtime)
│   └── Notifications/      # StatusNotification
├── config/                 # paypal, pusher/broadcasting, lfm, newsletter...
├── resources/              # Blade views & frontend assets
├── routes/                 # web & api routes
└── public/                 # compiled assets & screenshots
```

## Contributing

Open an [issue](https://github.com/morpheusadam/LaravelCommerce/issues) or submit a pull request with new features, fixes, or improvements.

## License

MIT. See [`LICENSE`](LICENSE) for details.

## Author

Morpheus Adam — [GitHub](https://github.com/morpheusadam) · [sam.zeonic.me](https://sam.zeonic.me) · morpheusadam95@gmail.com
