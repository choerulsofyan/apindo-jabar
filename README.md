# APINDO Jabar Website

This is a web application built for the Association of Indonesian Entrepreneurs (APINDO) for the West Java (Jabar) regional chapter. The application provides information about APINDO Jabar, their activities, and allows members to manage their profiles and access resources. The application also has an admin panel for managing content and users.

## Features

-   **Public Website:**

    -   Homepage featuring:
        -   Hero section with a dynamic slider displaying the latest news and images
        -   "About Us" section with video and links to various APINDO Jabar sections (Vision & Mission, Branches, History, etc.)
        -   Dynamic news section showcasing the latest news articles
        -   Gallery section displaying images from the latest events
        -   Contact section
        -   Footer with sitemap and contact details
    -   News detail page with related news
    -   Language switching using Google Translation Element

-   **Admin Panel:**
    -   User management (with roles and permissions using Spatie's Laravel Permission package)
    -   Role management
    -   Permission management
    -   News management (CRUD)
    -   Member management (CRUD)
    -   Regulation management (CRUD)
    -   Management of organizational structure (sectors, councils, positions)
    -   Gallery management (CRUD)
    -   Message management (CRUD)
    -   Activity log (using `spatie/laravel-activitylog`)

## Technology Stack

-   **Backend:**
    -   Laravel 10 (PHP framework)
    -   MySQL (database)
    -   Composer (PHP dependency manager)
-   **Frontend:**
    -   Bootstrap 5.3.3 (CSS framework)
    -   AdminLTE (admin panel template)
    -   Vite (frontend build tool)
    -   SCSS (CSS preprocessor)
    -   jQuery (JavaScript library, likely included with AdminLTE)
    -   Swiper.js (for the hero slider)
    -   Lightbox2 (for the image gallery)
-   **Templating Engine:**
    -   Blade (Laravel's templating engine)
-   **Packages:**
    -   `spatie/laravel-permission` (role and permission management)
    -   `spatie/laravel-activitylog` (activity logging)
    -   `intervention/image` (image manipulation)

## Installation

1.  **Clone the repository:**

    ```bash
    git clone <repository_url>
    cd <project_directory>
    ```

2.  **Install PHP dependencies:**

    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies:**

    ```bash
    npm install
    ```

4.  **Create a `.env` file:**

    -   Copy the `.env.example` file to `.env`:

        ```bash
        cp .env.example .env
        ```

    -   Edit the `.env` file and set the database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`), application URL (`APP_URL`), and other necessary configurations.

5.  **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

7.  **Seed the database (optional):**

    -   Seeders for roles, permissions, and initial data:

        ```bash
        php artisan db:seed
        ```

8.  **Create symbolic link for storage:**

    ```bash
    php artisan storage:link
    ```

9.  **Compile assets:**

    ```bash
    npm run dev
    ```

    Or, for production:

    ```bash
    npm run build
    ```

10. **Serve the application:**

    ```bash
    php artisan serve
    ```

    Visit `http://127.0.0.1:8000` (or the URL provided by the `serve` command) in the browser.

## Usage

-   **Admin Panel:** Access the admin panel by logging in with an administrator account. The admin routes are prefixed with `/mindo`.
-   **Public Website:** Access the public website through the root URL (e.g., `/`).

