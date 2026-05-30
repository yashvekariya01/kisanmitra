# 🌾 Kisan Mitra - Smart Agriculture Support System

Kisan Mitra is a full-stack web application designed to empower farmers and buyers by providing a direct marketplace, real-time APMC market rates, and smart agricultural insights. Originally built with core PHP, the entire ecosystem has been migrated to the **Laravel Framework** for enhanced security, scalability, and performance.

---

## 🚀 Key Features

*   **Direct Marketplace:** Connects farmers directly with potential buyers, eliminating middlemen.
*   **Real-time APMC Rates:** Provides up-to-date market prices for crops to help farmers make informed decisions.
*   **Role-Based Dashboards:** Distinct and secure portals for Farmers, Buyers, and Administrators.
*   **Secure Authentication:** Migrated from legacy login sessions to Laravel's robust built-in authentication mechanism.

---

## 🛠️ Tech Stack

*   **Backend Framework:** Laravel (PHP)
*   **Database:** MySQL
*   **Frontend:** Blade Templating Engine, Tailwind CSS / Bootstrap, JavaScript
*   **Version Control:** Git & GitHub

---

## 💻 Installation & Setup Guide

### 1. Prerequisites
Make sure you have **PHP**, **Composer**, and **MySQL (XAMPP)** installed on your machine.

### 2. Setup Commands
Run the following commands in your terminal to set up the project locally. (Make sure to open your `.env` file after generating it to update your `DB_DATABASE=kisanmitra` and other credentials before running migrations).

```bash
# Clone the repository and navigate to the project directory
git clone https://github.com/yashvekariya01/kisanmitra.git
cd kisanmitra

# Install backend dependencies via Composer
composer install

# Create environment configuration file from the example template
cp .env.example .env

# Generate the secure application encryption key
php artisan key:generate

# Run database migrations to create tables and relationships
php artisan migrate

# Start the local development server
php artisan serve