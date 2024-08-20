# Multi-Writer Blog Platform (codez)
## Objective

The objective of this project is to develop a PHP-based multi-writer blog platform where a single admin manages multiple writers. The platform provides a robust and scalable system that allows writers to register, log in, and manage their articles through an intuitive dashboard. The admin has full control over the platform, with the ability to track, approve, or reject articles submitted by writers. The system also incorporates role-based access control (RBAC) to ensure that each user only has access to the features relevant to their role.
Features
## 1. User Authentication

  - Writers can register, log in, and log out of the system.
  - Passwords are securely stored using hashing techniques.
  - Forgot password functionality with email verification.

## 2. Role-Based Access Control (RBAC)

  - Admin: Has full access to all features, including user management, article approval/rejection, and system settings.
  - Writer: Can create, edit, submit articles, and view their own dashboard.

## 3. Dashboard

  - Admin Dashboard:
        - View all writers and their submitted articles.
        - Approve or reject articles with feedback.
        - Monitor platform activity and user statistics.
  - Writer Dashboard:
        - View submitted articles and their approval status.
        - Create and edit new articles.
        - Manage personal profile information.

## 4. Article Management

  - Writers can create, edit, and submit articles.
  - Articles can be saved as drafts for future editing.
  - Admin can view, approve, or reject submitted articles.
  - Articles are categorized and tagged for better organization.

## 5. Notifications

  - Writers receive notifications when their articles are approved, rejected, or require edits.
  - Admin receives notifications when a new article is submitted.

## 6. Search and Filter

  - Search functionality for both admin and writers to find specific articles.
  - Filter articles by status (approved, pending, rejected) or category.

## 7. Responsive Design

  - The platform is designed to be responsive, ensuring a seamless experience on both desktop and mobile devices.

## Tech Stack
## Backend

  - PHP (Object-Oriented Programming): The core language used for building the platform, leveraging OOP principles for modular and maintainable code.
  - MySQL: The database used to store user information, articles, and other platform data.
  - Composer: Dependency manager for PHP to include necessary libraries and packages.
  - PHPMailer: Used for sending email notifications and password reset emails.

## Frontend

  - HTML5/CSS3: The foundational technologies for structuring and styling the platform.
  - JavaScript: For enhancing user interaction and handling client-side validations.
  - Bootstrap: A CSS framework used for creating a responsive design.

## Other Tools

  - Git: Version control system used to manage the codebase.
  - XAMPP/WAMP: Local development environment to run the PHP application during development.
  - VS Code/PhpStorm: Preferred IDEs for developing the project.

## Installation & Setup

  Clone the Repository
    - git clone [https://github.com/NarenderRajput/codez.git](https://github.com/NarenderRajput/codez.git)

## Set Up the Database

  - Create a new MySQL database.
  - Import the provided SQL dump file (database.sql) to set up the necessary tables.

## Configure the Environment

  - Rename .env.example to .env and update the database credentials and other configurations.

## Install Dependencies

    composer install

  - Run the Application
        - Use a local server like XAMPP or WAMP to run the application.
        - Open the browser and navigate to http://localhost/your-project-folder.

## License

This project is licensed under the MIT License.
