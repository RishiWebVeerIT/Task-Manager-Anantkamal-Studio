# Task-Manager-Anantkamal-Studio
This is a simple task manager application built with Laravel  You can manage your tasks, set deadlines, and track your progress.

## 🔧 Features

- ✅ Login / Register / Logout (Jetstream Livewire)
- ✅ Dashboard with tasks for the logged-in user
- ➕ Add Task (AJAX modal)
- ✏️ Edit Task (AJAX modal)
- ❌ Delete Task (AJAX)
- 🔁 Toggle Task Status: pending ↔ done (AJAX)
- 🔐 Tasks are user-specific (multi-user ready)

---

## 📦 Tech Stack

- Laravel 10+
- Laravel Jetstream (Livewire)
- jQuery & AJAX
- Bootstrap 5
- MySQL

---

## 🚀 Installation Instructions

1. **Clone the Repo**
   ```bash
   git clone https://github.com/RishiWebVeerIT/Task-Manager-Anantkamal-Studio.git
   cd task-manager

2.Install Dependencies

     composer install
     npm install && npm run build

3.Setup Environment

     cp .env.example .env
     php artisan key:generate

4.Set your DB settings in .env:

    DB_DATABASE=task_manager
    DB_USERNAME=root
    DB_PASSWORD=
5.Run Migrations

    php artisan migrate

6. Serve the Project

       php artisan serve

7. Task.sql

CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`),
  CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


Register a new user
Add, edit, delete tasks from dashboard

<img width="1920" height="1080" alt="Front Page" src="https://github.com/user-attachments/assets/39213189-7bcc-48eb-9c5c-c48b2d6ea200" />

<img width="1920" height="1080" alt="Popup" src="https://github.com/user-attachments/assets/7990868b-a4de-46b6-8e88-e5cd36babfde" />

<img width="1920" height="1080" alt="Task List" src="https://github.com/user-attachments/assets/b703e239-feb0-4a8b-8ff1-5fbb578a6ee9" />
