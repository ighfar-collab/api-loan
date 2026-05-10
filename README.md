API Loan Management System

A RESTful API system built with Laravel for loan management, featuring authentication using Laravel Sanctum. This project is designed with a simple clean architecture approach to ensure scalability, maintainability, and production-ready development standards.

🚀 Features
Authentication API (Register, Login, Logout)
Laravel Sanctum Token Authentication
CRUD Loan API
Repository Pattern
Service Layer
Form Request Validation
API Resource Transformation
Docker Support
RESTful JSON Response

🛠 Tech Stack
Technology Description
PHP 8.1 Backend Language
Laravel 10 Framework
MySQL Database
Laravel Sanctum API Authentication
Docker Containerization

📂 Project Structure
app/
├── Http/
│ ├── Controllers/API
│ ├── Requests
│ └── Resources
├── Models
├── Repositories
├── Services
├── Enums
├── Events
├── Listeners
└── Jobs

⚙️ Installation

1. Clone Repository
   git clone https://github.com/yourusername/api-loan.git
   cd api-loan
2. Install Dependency
   composer install
3. Setup Environment
   cp .env.example .env

Generate app key:

php artisan key:generate

4. Configure Database

Edit .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=loan
DB_USERNAME=root
DB_PASSWORD=

5. Install Sanctum
   composer require laravel/sanctum

Publish Sanctum:

php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider" 6. Run Migration
php artisan migrate 7. Run Server
php artisan serve

Server:

http://127.0.0.1:8000
🔐 Authentication

API menggunakan Bearer Token Authentication.

Tambahkan header:

Authorization: Bearer YOUR_TOKEN
📌 API Endpoints
Auth
Method Endpoint Description
POST /api/register Register user
POST /api/login Login user
POST /api/logout Logout user
Loans
Method Endpoint Description
GET /api/loans Get all loans
POST /api/loans Create loan
GET /api/loans/{id} Get loan detail
PUT /api/loans/{id} Update loan
DELETE /api/loans/{id} Delete loan
🧪 Example Request
Register
POST /api/register
{
"name": "Admin",
"email": "admin@mail.com",
"password": "password"
}
Login
POST /api/login
{
"email": "admin@mail.com",
"password": "password"
}
Create Loan
POST /api/loans
{
"amount": 1000000,
"interest_rate": 5,
"status": "pending",
"due_date": "2026-12-01"
}

🐳 Docker Setup

Run container:

docker compose up -d

Stop container:

docker compose down

🧠 Architecture

Project menggunakan:

Repository Pattern
Service Layer
Clean Controller
Request Validation
Resource Transformation

Tujuan:

scalable
maintainable
clean code
production-ready
📌 Future Improvements
Role & Permission
Loan Approval Workflow
Email Notification
Queue Processing
Payment Gateway
Redis Cache
Audit Log
Multi Tenant Support

👨‍💻 Author

Developed by Ighfar Ilaina

Backend Developer — Laravel & REST API

📄 License

This project is open-source and available under the MIT License.
