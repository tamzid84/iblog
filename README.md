# IBlog – Laravel 12 Blog Project

A simple blog application built with **Laravel 12**.  
It provides an admin panel to manage categories and posts, and a frontend to browse blog posts by category.

---

## 🚀 Features
- User-friendly **blog homepage** with:
  - Featured posts (latest 3)
  - Recent posts (paginated)
  - Sidebar with categories & post counts
- **Admin Panel**
  - Create, edit, delete categories
  - Create, edit, delete blog posts
- **Validation**
  - Required fields with error messages
  - Unique slugs for categories
- **Relationships**
  - A category has many posts
  - Each post belongs to a category
- Static comment section on post details

---

## 🛠️ Installation & Setup

1. Clone the repo
```bash
git clone https://github.com/tamzid84/iblog.git
cd iblog

2. Install dependencies
 composer install
npm install && npm run dev

3. Configure .env
  
  cp .env.example .env

4. Generate key
   php artisan key:generate

5. Run migrations

   php artisan migrate

6. Serve the app

   php artisan serve