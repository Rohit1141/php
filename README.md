# Student Management System

A simple PHP and MySQL-based web application for managing student records.

## Features

- Add new students
- View all students
- Update student information
- Delete students
- Responsive design
- Input validation
- SQL injection prevention

## Requirements

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web server (Apache/Nginx)

## Installation

1. **Install XAMPP**

   - Download and install XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
   - Start Apache and MySQL services from XAMPP Control Panel

2. **Set Up Database**

   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database by importing the `database.sql` file
   - Or run the SQL commands manually from `database.sql`

3. **Configure Database Connection**

   - Open `db.php`
   - Update the database credentials if needed:
     ```php
     $host = 'localhost';
     $user = 'root';
     $pass = ''; // Your MySQL password
     $db   = 'school';
     ```

4. **Place Files in Web Directory**

   - Copy all project files to your web server's document root
   - For XAMPP: `C:\xampp\htdocs\student-management\`

5. **Access the Application**
   - Open your web browser
   - Navigate to: `http://localhost/student-management/`

## Project Structure

```
student-management/
├── index.php          # Main application file
├── db.php            # Database connection
├── student_crud.php  # CRUD operations
├── database.sql      # Database setup
└── README.md         # This file
```

## Usage

1. **Add a Student**

   - Fill in the form at the top of the page
   - Click "Add Student"

2. **View Students**

   - All students are listed in the table below the form

3. **Update a Student**

   - Click the "Edit" button next to a student
   - Modify the information
   - Click "Update"

4. **Delete a Student**
   - Click the "Delete" button next to a student
   - Confirm the deletion

## Security Features

- Prepared statements to prevent SQL injection
- Input validation
- HTML escaping to prevent XSS
- Confirmation dialog for deletions

## Troubleshooting

1. **Database Connection Error**

   - Verify MySQL is running
   - Check database credentials in `db.php`
   - Ensure database and table exist

2. **Page Not Found**

   - Verify files are in correct directory
   - Check Apache is running
   - Verify file permissions

3. **Form Not Working**
   - Check PHP error logs
   - Verify all required fields are filled
   - Check database connection
