# Library Management System

A web-based project developed as part of the **Introduction to Web Development** (Course Code: 4340704) course in the Diploma Engineering program at Gujarat Technological University (GTU).

## 📋 Project Overview

This project demonstrates a comprehensive library management system designed to streamline operations for both librarians and students. It covers student registration, book management, book issuing/returning, demand tracking, and fine management — all through a clean, web-based interface.

## 📸 Screenshots

### Dashboard
![Dashboard](screenshots/Dashboard.png)

### Student Section
![Student Section](screenshots/StudentSection.png)

## 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| 🌐 HTML | Frontend Structure |
| 🎨 CSS | Styling & Layout |
| 🅱️ Bootstrap | Responsive UI Components |
| 🐘 PHP | Backend Programming |
| 🐬 MySQL | Database Management |
| 🚀 Apache | Web Server |

## 📁 Project Structure

```
LibraryManagementSystem/
├── dashboard.php               # Admin dashboard with stats
├── dashboard_totalstudents.php # Total students view
├── dashboard_totalbooks.php    # Total books view
├── dashboard_totalavailablebooks.php
├── dashboard_totalissuedbooks.php
├── dashboard_issuedbooktostudent.php
├── student_section.php         # Student listing & search
├── add_student.php             # Add new student form
├── book_department.php         # Book catalog & search
├── add_book.php                # Add new book form
├── book_issued.php             # Issue book to student
├── book_renew.php              # Renew issued book
├── book_return.php             # Return a book
├── student_demand.php          # Student book demand
├── see_demand.php              # View student demands
├── first.php                   # Session check
├── db.php                      # Database connection
├── screenshots/
│   ├── Dashboard.png
│   ├── StudentSection.png
│   ├── BookDepartment.png
│   └── BookIssued.png
└── README.md
```

## ⚙️ Modules

- **Dashboard** – Displays total students, total books, available books, and issued books at a glance
- **Add New Student** – Registers students with name, registration number, gender, contact info, and more
- **Cancel Student Membership** – Removes a student from the active membership list
- **Access Student Records** – Retrieves complete student information including borrowed books and fines
- **Add New Book** – Adds books to the catalog with title, author, ISBN, publisher, and other details
- **Search Book** – Searches the catalog by title, author, or keyword with full availability details
- **Issue Book to Student** – Issues available books to students with automatic 7-day due date calculation
- **Renew Book** – Extends the due date for eligible borrowed books
- **Return Book** – Marks a book as returned and updates catalog availability
- **Add Student Demand** – Records student requests for unavailable books
- **See Student Demands** – Displays all book demands made by students

## 🗄️ Database Setup

Run the following SQL to set up the database:

```sql
CREATE DATABASE library_management;

USE library_management;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    s_name VARCHAR(100) NOT NULL,
    sfather_name VARCHAR(100),
    s_surname VARCHAR(100),
    s_address VARCHAR(255),
    gender VARCHAR(10) NOT NULL,
    s_email VARCHAR(100),
    s_phoneno VARCHAR(15) NOT NULL,
    s_birth_date DATE
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_title VARCHAR(200) NOT NULL,
    language VARCHAR(50),
    author VARCHAR(100) NOT NULL,
    publisher VARCHAR(100),
    year YEAR,
    pages INT,
    location VARCHAR(100),
    price DECIMAL(10,2),
    isbn_no VARCHAR(20) UNIQUE,
    keyword VARCHAR(200),
    status TINYINT DEFAULT 1  -- 1 = available, 0 = issued
);

CREATE TABLE book_issueds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    book_id INT NOT NULL,
    book_name VARCHAR(200),
    issued_date DATE NOT NULL,
    due_date DATE NOT NULL
);
```

## 🚀 How to Run

1. Clone this repository
2. Move the project folder to your server's root directory (e.g., `htdocs` for XAMPP)
3. Set up the MySQL database using the SQL above
4. Update the database credentials in `db.php` if needed
5. Start Apache and MySQL from XAMPP / WAMP Control Panel
6. Open `http://localhost/LibraryManagementSystem/dashboard.php`

## 📅 Submitted

**Branch:** Diploma in Computer Engineering  
**Semester:** 4th  
**Subject:** Introduction to Web Development (4340704)  
**Submitted to:** Gujarat Technological University (GTU)
