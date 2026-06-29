<div align="center">

# 🛒 LaravelCommerce

### A full-featured, SEO-ready e-commerce platform built with **Laravel 11** — responsive storefront, powerful admin panel, real-time notifications, social login, and PayPal payments, with full **RTL / Persian** support.

<p>
  <img src="https://img.shields.io/github/license/morpheusadam/LaravelCommerce?style=for-the-badge&color=4c1" alt="License" />
  <img src="https://img.shields.io/github/stars/morpheusadam/LaravelCommerce?style=for-the-badge&color=ffca28" alt="Stars" />
  <img src="https://img.shields.io/github/forks/morpheusadam/LaravelCommerce?style=for-the-badge&color=42a5f5" alt="Forks" />
  <img src="https://img.shields.io/github/last-commit/morpheusadam/LaravelCommerce?style=for-the-badge&color=8e44ad" alt="Last commit" />
  <img src="https://img.shields.io/github/repo-size/morpheusadam/LaravelCommerce?style=for-the-badge&color=e67e22" alt="Repo size" />
</p>

<p>
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Vue.js-2-4FC08D?style=for-the-badge&logo=vuedotjs&logoColor=white" alt="Vue" />
  <img src="https://img.shields.io/badge/Bootstrap-UI-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap" />
  <img src="https://img.shields.io/badge/Pusher-Realtime-300D4F?style=for-the-badge&logo=pusher&logoColor=white" alt="Pusher" />
  <img src="https://img.shields.io/badge/PayPal-Payments-00457C?style=for-the-badge&logo=paypal&logoColor=white" alt="PayPal" />
</p>

</div>

---

## 📖 Overview

**LaravelCommerce** is a complete, production-style **online store / shopping cart** application built on the **Laravel 11** framework. It ships with a responsive customer-facing storefront, a feature-rich admin dashboard, role-based access control, blog/CMS capabilities, and a clean, modular codebase that's easy to extend.

The platform covers the full retail workflow — product catalog with attributes (cost price, promo price, stock, size), cart, wishlist, coupons, product reviews, order tracking, and PDF invoice generation — plus **Laravel Socialite** social login (Facebook, Google, Twitter), **Laravel Pusher** real-time notifications and messaging, newsletter management, and **PayPal** payment integration. It is fully **RTL-aware** with first-class **Persian** language support, making it ideal for both LTR and RTL markets.

It's a great starting point for **developers, agencies, and startups** who need a customizable Laravel e-commerce solution with an admin panel out of the box.

> 🔎 **Keywords:** laravel ecommerce, laravel 11 shop, online store, shopping cart, admin panel, rtl laravel, persian ecommerce, laravel socialite, pusher notifications, paypal payment, wishlist, coupons, product reviews.

---

## ✨ Features

### 🖥️ Storefront

- 📱 **Responsive design** for desktop, tablet, and mobile.
- 🛍️ **Cart, wishlist & product reviews** with multi-level comments.
- 🏷️ **Coupons & discounts** and rich product attributes (cost price, promo price, stock, size, …).
- 📝 **Blog/CMS**: categories, tags, content pages.
- 🔌 **Modules**: shipping, payment, discounts, and more.
- 🔍 **SEO-friendly URLs** and product search.
- 📰 **Newsletter management** (Spatie Newsletter).
- 🔔 **Real-time contact forms & notifications** via Laravel Pusher.
- 🔁 **Related products & per-category recommendations**.
- 👥 **Social login** with Laravel Socialite (Facebook, Google, Twitter).
- 📤 **Social sharing & follow** across platforms.
- 💳 **PayPal payment integration** and an **order tracking** system.

### 🛠️ Admin Panel

- 🔐 **Roles & permissions** for admins.
- 📦 **Product, category, brand & shipping management**.
- 🗂️ **Media manager** powered by UniSharp Laravel File Manager.
- 🖼️ **Banner management** and **order management**.
- 💬 **Review management** and **blog/category/tag manager**.
- 👤 **User & coupon management**.
- ⚙️ **System configuration**: email settings, store info, maintenance mode, …
- 📊 **Line & pie charts** for analytics.
- 🧾 **PDF order generation** (DomPDF).
- 📨 **Real-time messages & notifications**.

### 👤 Customer Dashboard

- 📦 Order management
- 💬 Review management
- ⚙️ Profile settings

---

## 🛠️ Tech Stack

<p align="center">
  <img src="https://skillicons.dev/icons?i=laravel,php,mysql,vue,bootstrap,sass,js" alt="Tech stack" />
</p>

| Layer | Technologies |
| --- | --- |
| Backend | Laravel 11, PHP, Laravel Sanctum, Tinker, Laravel UI |
| Frontend | Blade, Vue 2, Bootstrap, jQuery, Sass, Laravel Mix |
| Realtime | Pusher, Laravel Echo |
| Payments | srmklive/paypal (PayPal) |
| Media & PDF | UniSharp Laravel File Manager, Intervention Image, Barryvdh DomPDF |
| Auth & Social | Laravel Socialite (Facebook, Google, Twitter) |
| Marketing | Spatie Laravel Newsletter |

---

## 🚀 Getting Started

### Prerequisites

- **PHP 8.x** with Composer
- **MySQL** database
- **Node.js & npm** (for frontend assets)

### Installation

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

# 5. Configure your database (and SMTP / PayPal / Pusher) credentials in .env
```

### Database & Assets

```bash
# Import the provided database dump
# (e.g. database/e-shop.sql) into your MySQL database

# Link storage and build assets
php artisan storage:link
npm run dev

# Serve the application
php artisan serve
```

Open `http://localhost:8000` in your browser. Visit `/admin` to reach the admin panel.

> ⚙️ Configure your **SMTP**, **PayPal**, and **Pusher** credentials in `.env` to enable email, payments, and real-time features. This project uses email for registration and login.

---

## 🗂️ Project Structure

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

---

## 🤝 Contributing

Contributions are welcome! Open an [issue](https://github.com/morpheusadam/LaravelCommerce/issues) or submit a pull request with new features, fixes, or improvements.

## 📜 License

Distributed under the **MIT License**. See [`LICENSE`](LICENSE) for details.

---

<div align="center">

### 👤 Author — Morpheus Adam

Web developer & cheerful hacker · PHP · Laravel · Go

<p>
  <a href="https://github.com/morpheusadam"><img src="https://img.shields.io/badge/GitHub-morpheusadam-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub" /></a>
  <a href="https://sam.zeonic.me"><img src="https://img.shields.io/badge/Website-sam.zeonic.me-4c1?style=for-the-badge&logo=googlechrome&logoColor=white" alt="Website" /></a>
  <a href="mailto:morpheusadam95@gmail.com"><img src="https://img.shields.io/badge/Email-Contact-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Email" /></a>
</p>

⭐ **If LaravelCommerce helped you build your store, please give it a star!** ⭐

</div>
