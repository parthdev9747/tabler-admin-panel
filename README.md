# Laravel Tabler Boilerplate

## Description

This boilerplate provides a solid foundation for building web applications using Laravel with the Tabler admin panel. It includes essential tools and libraries to streamline development, enhance productivity, and maintain code quality.

## Packages Used

-   **yajra/laravel-datatables**: Facilitates efficient and dynamic listing of records.
-   **spatie/laravel-permission**: Implements a robust role-based access control system.
-   **riftingly/rector-laravel**: Provides automated code refactoring for Laravel applications.
-   **rector/rector**: A powerful tool for automated PHP code upgrades and improvements.

## Features

-   Pre-configured Laravel setup with Tabler UI.
-   Seamless integration of DataTables for enhanced data management.
-   Role-based authentication and authorization.
-   Automated code refactoring with Rector for improved maintainability.
-   Clean and modular code structure for scalability.

## Installation

1. Clone the repository:
    ```bash
    git clone <repository-url>
    ```
2. Navigate to the project directory:
    ```bash
    cd project-folder
    ```
3. Install dependencies:
    ```bash
    composer install
    ```
4. Set up the environment file:
    ```bash
    cp .env.example .env
    ```
5. Generate the application key:
    ```bash
    php artisan key:generate
    ```
6. Run database migrations:
    ```bash
    php artisan migrate
    ```
7. Run database migrations:

    ```bash
    php artisan db:seed
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

-   Use the provided authentication system to manage user roles and permissions.
-   Utilize DataTables for dynamic data listing and management.
-   Leverage Rector for automated code upgrades and refactoring.
-   Extend and customize the boilerplate to fit your application's needs.
