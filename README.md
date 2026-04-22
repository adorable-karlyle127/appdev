# Student Management System

A professional web application for managing student records with a modern, clean interface.

## Features

- **Student List** - View all student records in a beautifully styled data table
- **Add Students** - Create new student records with name, email, and course information
- **Edit Students** - Update existing student information
- **Modern UI** - Professional and responsive design with smooth animations
- **Responsive Design** - Works seamlessly on desktop and mobile devices
- **User-Friendly** - Intuitive interface with clear navigation and feedback

## File Structure

```
appdev/
├── index.php        # Main dashboard - displays all students
├── create.php       # Add new student form
├── edit.php         # Edit existing student form
├── db.php           # Database connection configuration
├── ui.php           # Shared UI styling and layout functions
└── README.md        # This file
```

## Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL/MariaDB database
- XAMPP or similar local server

### Database Setup

1. Create a new database named `school_db`:
```sql
CREATE DATABASE school_db;
```

2. Create the `students` table:
```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Configuration

1. Update database credentials in `db.php` if needed:
```php
$host = 'localhost';
$db   = 'school_db';
$user = 'root';
$pass = '';  // Add your password if required
```

2. Place the project in your web root directory (e.g., `C:\xampp\htdocs\appdev\`)

3. Access the application at: `http://localhost/appdev/`

## Usage

### Dashboard (index.php)
- View all student records
- Click "Edit" to modify a student's information
- Click "+ Add Student" to create a new record

### Adding a Student (create.php)
1. Click the "+ Add Student" button
2. Fill in the required fields:
   - Full Name
   - Email Address
   - Course
3. Click "Add Student" to save
4. You'll be redirected to the dashboard with a success message

### Editing a Student (edit.php)
1. Click "Edit" next to a student's record
2. Update the information as needed
3. Click "Update Student" to save changes
4. You'll be redirected to the dashboard with confirmation

## UI Styling

The application features a custom design system with:
- **Color Palette**: Professional sage green scheme
- **Typography**: Clean, modern sans-serif fonts
- **Spacing**: Consistent padding and margins throughout
- **Animations**: Smooth transitions and fade-in effects
- **Responsive**: Mobile-friendly layout that adapts to all screen sizes

## Functions

### renderPageStart($title, $subtitle = '')
Renders the HTML page header with styling and navigation
- **Parameters**: 
  - `$title` (string): Page title
  - `$subtitle` (string): Optional subtitle

### renderPageEnd()
Renders the closing HTML tags and footer

## Browser Compatibility

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers

## Future Enhancements

- 🔍 Search and filter functionality
- 📊 Dashboard statistics
- 🗑️ Soft delete functionality
- 📥 Bulk import/export
- 📧 Email notifications
- 👤 User authentication

## License

This project is open source and available for educational purposes.

## Support

For issues or questions, please review the code comments or contact the development team.

---

**Last Updated**: April 22, 2026
