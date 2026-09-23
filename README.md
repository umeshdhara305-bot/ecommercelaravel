# Laravel E-Commerce Website

A full-stack e-commerce website built with **Laravel**, **MySQL**, **Bootstrap**, **JavaScript**, **jQuery/AJAX**, and the **E-Shopper** frontend template.

The project includes a customer-facing shopping website, authentication, product browsing, shopping cart, checkout, order management, blog, contact system, and an admin panel for managing the store.

---

## 🚀 Project Overview

This project was developed as a practical Laravel e-commerce application to understand how a real-world online shopping website is structured and developed.

The application provides separate functionality for:

- Customers
- Administrators
- Products
- Categories
- Brands
- Shopping Cart
- Orders
- Blog
- Contact Messages
- Website Settings

---

## ✨ Features

### 👤 User Features

- User Registration
- User Login
- User Logout
- Authentication
- User Profile
- Product browsing
- Product details
- Category-based product filtering
- Brand-based product filtering
- Product search
- Pagination
- Add products to cart
- Update cart quantity
- Remove products from cart
- Checkout
- Shipping address
- Phone number
- Order notes
- Cash on Delivery
- Direct Bank Transfer
- Order confirmation
- View previous orders
- View order details

---

### 🛒 Shopping Cart

The shopping cart allows customers to:

- Add products
- Increase/decrease quantity
- Remove products
- Calculate subtotal
- Calculate total amount
- Continue shopping
- Proceed to checkout

Cart data is handled using Laravel session functionality.

---

### 📦 Order Management

Customers can:

- Place orders
- View order confirmation
- View their previous orders
- View individual order details

Each order contains:

- Customer
- Products
- Quantity
- Product price
- Subtotal
- Total amount
- Shipping address
- Phone number
- Payment method
- Payment status
- Order status
- Notes

---

### 🛍️ Product Management

The admin panel provides product management functionality.

Products include:

- Product name
- Category
- Brand
- Price
- Image
- Description
- Status
- Featured status
- Recommended status

---

### 📂 Category Management

Admin can manage product categories including:

- Category name
- Description
- Status

Products are connected to categories using Laravel Eloquent relationships.

---

### 🏷️ Brand Management

Admin can manage:

- Brand name
- Brand description
- Brand logo
- Status

Products are connected to brands using Eloquent relationships.

---

### ⭐ Featured & Recommended Products

Products can be marked as:

- Featured
- Recommended

These products can then be displayed in the frontend based on their status.

---

### 🔎 AJAX Product Search

The website includes AJAX-based product search.

Users can search for products without requiring a complete page reload.

Technologies used:

- jQuery
- AJAX
- Laravel routes
- Laravel controllers
- Eloquent queries

---

### 📝 Blog System

The project includes a blog management system.

Admin can manage:

- Blog title
- Blog slug
- Blog description
- Blog image
- Blog status

The frontend includes:

- Blog listing
- Blog details
- Blog slug-based URLs

---

### 📩 Contact System

The website includes a contact form.

Users can submit:

- Name
- Email
- Subject
- Message

The contact form uses AJAX validation and submission.

Website contact information can also be managed through the admin/settings system.

---

### ⚙️ Website Settings

The website settings system supports information such as:

- Site name
- Address
- City
- Country
- Mobile
- Fax
- Email

These settings can be displayed dynamically throughout the website.

---

### 👨‍💼 Admin Panel

The admin panel provides management functionality for the e-commerce website.

Admin sections include:

- Dashboard
- Categories
- Brands
- Products
- Customers
- Orders
- Blog
- Contact Messages
- Website Settings

---

## 🧱 Project Structure

The project follows the Laravel MVC architecture.

```text
ecommercelaravel/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── assets/
│   └── uploads/
│
├── resources/
│   └── views/
│       ├── admin/
│       └── frontend/
│
├── routes/
│   ├── web.php
│   └── api.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── composer.lock
├── package.json
└── vite.config.js