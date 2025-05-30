# 🕵️ Anonymous Posts – Laravel Web App

A simple Laravel-based application where users can submit anonymous posts and admins can manage them.

## 🎯 Objectives

- Allow users to submit anonymous posts
- Display all accepted posts on the homepage
- Admin can accept, decline, or delete posts
- Declined posts are stored and shown in a separate view

## 👨‍💻 User Features

- Submit anonymous posts using a simple form
- View all accepted posts on the homepage

## 🛠️ Admin Features

- View all submitted posts
- Accept or decline posts
- View all declined posts on a separate page
- Delete accepted or declined posts

## 🏗️ Setup Instructions

1. **Clone the project:**
   ```bash
   git clone https://github.com/EdwrdEDU/Anonymous.git
   cd anonymous

2. **Install dependencies:**
   ```bash
   composer install

3. **Set up your environment:**
   ```bash
   copy .env.example .env
   php artisan key:generate


4. **Configure your .env file:**
   ```bash
   go to .env
   change DB_CONNECTION=sqlite

5. **Run migrations:**
   ```bash
   php artisan migrate

6. **Run seeder:**
   ```bash
   php artisan db:seed

7. **Generate the application key:**
   ```bash
   php artisan key:generate

8. **Start the server:**
   ```bash
   php artisan serve

## 📂 Basic Structure

- routes/web.php – Defines all app routes
- app/Http/Controllers/PostController.php – Handles post logic
- resources/views/ – Blade templates for user and admin views
- app/Models/Post.php – Post model
- database/migrations/ – Post table schema with status field

## 📝 Post Statuses

- Pending – Newly submitted posts (awaiting admin review)
- Accepted – Visible on the homepage
- Declined – Visible on the Declined Posts page