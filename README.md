# GPS-Based Attendance System

A web-based attendance application designed to help employees record their attendance using GPS location tracking, review attendance history, and access attendance reports.

## Overview

The GPS-Based Attendance System is a Laravel-based application developed to support employee attendance management through location-based attendance recording.

The application provides an authentication system for employees, GPS-based attendance functionality, attendance history, and attendance reports in one place.

This project demonstrates the development of a web application using Laravel and its supporting technologies.

## Features

- **User Authentication** — Provides a login system for employee access.
- **GPS-Based Attendance** — Supports attendance recording using GPS location functionality.
- **Attendance History** — Allows employees to review their recorded attendance history.
- **Attendance Reports** — Provides access to attendance reports.

## Technologies Used

- **PHP** — Backend programming language
- **Laravel** — Web application framework
- **Composer** — PHP dependency management
- **JavaScript and CSS** — Frontend technologies, depending on the project implementation

*Note: The exact versions and additional technologies can be confirmed from the project configuration files.*

## Project Structure

The project follows a Laravel application structure.

```text
gps-based-attendance-system/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── artisan
├── composer.json
├── composer.lock
├── package.json
└── README.md
```

## Getting Started

### Prerequisites

Before setting up the application, ensure that the required software is installed:

- PHP version compatible with the project dependencies
- Composer
- A database supported by the application configuration
- Node.js and npm, if required by the frontend build process

### Installation

1. Clone the repository.

   ```bash
   git clone https://github.com/haidapid/gps-based-attendance-system.git
   ```

2. Navigate to the project directory.

   ```bash
   cd gps-based-attendance-system
   ```

3. Install PHP dependencies.

   ```bash
   composer install
   ```

4. Create a local environment configuration file by copying the example file.

   ```bash
   cp .env.example .env
   ```

   On Windows Command Prompt, you can use:

   ```cmd
   copy .env.example .env
   ```

5. Configure the environment variables in `.env`, including the database connection settings required by the application.

6. Generate the Laravel application key.

   ```bash
   php artisan key:generate
   ```

7. Configure the database and run migrations if the application requires them.

   ```bash
   php artisan migrate
   ```

8. Start the Laravel development server.

   ```bash
   php artisan serve
   ```

   Open the local URL displayed in the terminal to access the application.

*Setup note: These are standard Laravel setup steps. Database requirements, migration status, frontend build commands, and GPS-specific configuration should be verified against the project before running the application.*

## GPS Attendance

The application includes GPS-based attendance functionality. Its exact location validation process, permission requirements, and supported attendance actions depend on the implementation.

Location access may require user permission and an appropriate browser environment.

## Project Purpose

This project was developed as an opportunity to explore web application development and location-based attendance functionality.

It brings together authentication, attendance records, and reporting features in a single application, demonstrating the practical use of Laravel in an employee attendance system.

## Future Improvements

Potential areas for further development include:

- Improving the presentation of attendance reports.
- Enhancing the user experience for location-based attendance.
- Adding clearer attendance summaries and data visualizations.
- Improving documentation and application testing.

These items represent potential improvements and are not claims about existing functionality.

## Author

**David Dwi Ariyadi**

GitHub: [@haidapid](https://github.com/haidapid)

---

*This project is part of my software development portfolio.*</WritingBlock
