# Loan Management API

Production-ready RESTful API built with Laravel for managing loan data, repayment data, user authentication, and scalable backend operations.

This project follows clean architecture principles using Repository Pattern and Service Layer to improve maintainability, scalability, and code organization.

---

## ✨ Features

- Secure Authentication with Laravel Sanctum
- User Registration & Login
- Token-Based API Authentication
- Loan CRUD Operations
- Repayment CRUD Operations
- Clean Architecture Structure
- Repository Pattern
- Service Layer
- Form Request Validation
- API Resource Transformation
- RESTful JSON Responses
- Docker Support

---

# 🛠 Tech Stack

| Technology      | Usage              |
| --------------- | ------------------ |
| PHP 8.1         | Backend Language   |
| Laravel 10      | Framework          |
| MySQL           | Database           |
| Laravel Sanctum | API Authentication |
| Docker          | Containerization   |

---

# 🚀 Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

# 🔐 Authentication

This API uses Bearer Token Authentication.

Example Header:

```http
Authorization: Bearer YOUR_ACCESS_TOKEN
```

---

# 📌 API Endpoints

## Authentication

| Method | Endpoint      |
| ------ | ------------- |
| POST   | /api/register |
| POST   | /api/login    |
| POST   | /api/logout   |

## Loans

| Method | Endpoint        |
| ------ | --------------- |
| GET    | /api/loans      |
| POST   | /api/loans      |
| GET    | /api/loans/{id} |
| PUT    | /api/loans/{id} |
| DELETE | /api/loans/{id} |

## Repayments

| Method | Endpoint             |
| ------ | -------------------- |
| GET    | /api/repayments      |
| POST   | /api/repayments      |
| GET    | /api/repayments/{id} |
| PUT    | /api/repayments/{id} |
| DELETE | /api/repayments/{id} |

---

# 👨‍💻 Author

Ighfar Ilaina  
Backend Developer — Laravel & REST API
