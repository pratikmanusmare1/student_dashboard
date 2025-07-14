# 🎓 Student Dashboard - Laravel Application

A comprehensive student management system built with Laravel 10, featuring authentication, profile management, and a responsive single-page design.

## 📋 Table of Contents
- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Prerequisites](#-prerequisites)
- [Installation Guide](#-installation-guide)
- [Database Setup](#-database-setup)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Authentication System](#-authentication-system)
- [Screenshots](#-screenshots)
- [Contributing](#-contributing)
- [Contact](#-contact)

## ✨ Features

### 🔐 Authentication System
- **User Registration** with form validation
- **Secure Login** with session management
- **Password Protection** using bcrypt hashing
- **CSRF Protection** on all forms
- **Route Protection** with middleware

### 👤 Student Profile Management (CRUD)
- **Personal Details**: Name, DOB, Email, Contact, Address
- **Educational Details**: Qualification, Year of Passing, University/Institute
- **Professional Details**: Organization, Experience, Skills
- **Complete CRUD Operations**: Create, Read, Update, Delete profiles
- **Form Validation** with user-friendly error messages

### 🎨 User Interface
- **Single-Page Scrolling Layout** with smooth navigation
- **Responsive Design** (Mobile, Tablet, Desktop)
- **Bootstrap 5** integration with custom styling
- **Hero Section** with app introduction
- **About Us** and **Contact** sections
- **Interactive Modals** for authentication
- **Dashboard** with profile management

### 🛡️ Security Features
- **Input Validation** on all forms
- **SQL Injection Protection** via Eloquent ORM
- **XSS Protection** with Blade templating
- **Session Security** with proper logout handling

## 🛠️ Technology Stack

### Backend
- **PHP 8.1+**
- **Laravel 10.x**
- **MySQL 8.0+**
- **Composer** for dependency management

### Frontend
- **HTML5** & **CSS3**
- **JavaScript (ES6+)**
- **Bootstrap 5.3**
- **Bootstrap Icons**
- **Vite** for asset compilation

### Development Tools
- **Git** for version control
- **NPM** for frontend dependencies
- **Artisan** CLI for Laravel commands

## 📋 Prerequisites

Before installing this application, ensure you have:

- **PHP >= 8.1** with extensions:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
- **Composer** (latest version)
- **Node.js & NPM** (v16+ recommended)
- **MySQL** (8.0+ recommended)
- **Git** for cloning the repository

## 🚀 Installation Guide

### Step 1: Clone the Repository
```bash
git clone https://github.com/pratikmanusmare1/student_dashboard.git
cd student_dashboard
```

### Step 2: Install PHP Dependencies
```bash
composer install
```

### Step 3: Install Frontend Dependencies
```bash
npm install
```

### Step 4: Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 5: Configure Database
Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 6: Database Setup
```bash
# Run migrations to create tables
php artisan migrate
```

### Step 7: Build Frontend Assets
```bash
# For development
npm run dev

# For production
npm run build
```

### Step 8: Start the Application
```bash
# Start Laravel development server
php artisan serve
```

The application will be available at: `http://127.0.0.1:8000`

## 🗄️ Database Setup

### Option 1: Using Migrations (Recommended)
The application includes migrations that will create all necessary tables:
```bash
php artisan migrate
```

### Option 2: Using SQL File (If provided)
If a database SQL file is included in the root folder:
1. Create a database named `student`
2. Import the SQL file into your MySQL database
3. Update `.env` file with your database credentials

### Database Tables Created:
- `users` - User authentication data
- `student_profiles` - Student profile information
- `password_reset_tokens` - Password reset functionality
- `failed_jobs` - Failed job tracking
- `personal_access_tokens` - API token management

## 📖 Usage

### 1. Registration & Login
1. Visit the homepage
2. Click "Sign Up" to create a new account
3. Fill in your details and submit
4. You'll be automatically logged in and redirected to the dashboard

### 2. Profile Management
1. After login, go to the dashboard
2. Click "Create Profile" to add your details
3. Fill in Personal, Educational, and Professional information
4. Save your profile
5. Use "Edit Profile" to update information
6. Use "Delete Profile" to remove your profile (with confirmation)

### 3. Navigation
- **Home**: Landing page with smooth scrolling sections
- **Dashboard**: Main user area with profile management
- **Profile**: View and manage your student profile

## 📁 Project Structure

## 🔐 Authentication System

### Implementation Details
- **Framework**: Laravel's built-in authentication
- **Password Hashing**: Bcrypt algorithm
- **Session Management**: Laravel sessions with CSRF protection
- **Route Protection**: Middleware-based access control

### Security Features
- Input validation and sanitization
- SQL injection prevention via Eloquent ORM
- XSS protection with Blade templating
- Secure password storage with hashing
- CSRF token validation on forms

## 🎯 Key Features for Assessment

### Code Quality
- **Clean Architecture**: Follows Laravel conventions
- **MVC Pattern**: Proper separation of concerns
- **Database Relationships**: Eloquent ORM with proper relationships
- **Form Validation**: Comprehensive server-side validation
- **Error Handling**: User-friendly error messages

### User Experience
- **Responsive Design**: Works on all devices
- **Intuitive Navigation**: Easy-to-use interface
- **Form Feedback**: Real-time validation feedback
- **Success Messages**: Clear user feedback

### Technical Implementation
- **RESTful Routes**: Proper HTTP methods for CRUD operations
- **Database Design**: Normalized database structure
- **Frontend Integration**: Bootstrap with custom styling
- **Asset Management**: Vite for modern asset compilation

## 🤝 Contributing

This project is open for improvements. Feel free to:
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## 📞 Contact

**Developer**: Pratik Manusmare
**Email**: pratikmanusmare2@gmail.com
**Phone**: +91 7030281823
**GitHub**: [pratikmanusmare1](https://github.com/pratikmanusmare1)

---

### 📝 Notes for Interviewers

This project demonstrates:
- **Full-stack development** skills with Laravel
- **Database design** and management
- **Authentication** implementation
- **CRUD operations** with proper validation
- **Responsive web design** principles
- **Git version control** usage
- **Clean code** practices and documentation

For any installation issues or questions, please contact the developer using the information above.

---

**⭐ If you find this project helpful, please consider giving it a star on GitHub!**

