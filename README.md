# APINDO Jabar Website

This is a web application built for the Association of Indonesian Entrepreneurs (APINDO) for the West Java (Jabar) regional chapter. The application provides information about APINDO Jabar, their activities, and allows members to manage their profiles and access resources. The application also has an admin panel for managing content and users.

## Features

-   **Public Website:**

    -   Homepage with:
        -   Hero section with a dynamic slider (latest news with images and two static slides)
        -   "About Us" section with video and text content
        -   Dynamic news section showcasing the latest 4 news articles
        -   Gallery section displaying the latest 8 images
        -   Contact section
        -   Affiliate logos section
        -   Footer with copyright information
    -   News detail page with related news
    -   Gallery detail page (implementation not fully complete in the conversation, but planned)
    -   Language switching (basic implementation using a `select` dropdown and `localStorage`)

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

    -   Edit the `.env` file and set your database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`), application URL (`APP_URL`), and other necessary configurations.

5.  **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

7.  **Seed the database (optional):**

    -   If you have seeders for roles, permissions, and initial data:

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

    Visit `http://127.0.0.1:8000` (or the URL provided by the `serve` command) in your browser.

## Usage

-   **Admin Panel:** Access the admin panel by logging in with an administrator account. The admin routes are prefixed with `/mindo`.
-   **Public Website:** Access the public website through the root URL (e.g., `/`).

## Configuration

-   **`.env`:** Configure your database connection, email settings, and other environment-specific variables in the `.env` file.
-   **`config/app.php`:** Set your application's locale, timezone, and other core settings.
-   **`config/activitylog.php`:** (Optional) Customize the activity log settings (e.g., table name, model).
-   **`config/permission.php`:** Configure the Spatie Laravel Permission package (roles and permissions).
-   **`tailwind.config.js`:** If you decide to use Tailwind CSS for the public pages later, configure the content to include the paths to your Blade templates.
-   **`vite.config.js`:** Configure Vite to build your frontend assets, including separate entry points for admin and public styles.

**Further Development:**

-   **Complete Gallery Module:** Fully implement the gallery module, including image uploads, management, and public display.
-   **Improve News Section:** Add more features to the news section, such as categories, tags, comments, or search functionality.
-   **Implement Member Registration:** Create a proper registration form and process for new members.
-   **Enhance Security:** Implement additional security measures, such as email verification, two-factor authentication, and more robust password policies.
-   **Optimize Performance:** Optimize your application's performance by caching frequently accessed data, optimizing database queries, and compressing assets.
-   **Testing:** Write unit and feature tests to ensure the quality and reliability of your code.

This comprehensive `README.md` file provides a good overview of your project's structure, features, and technology stack. You can further customize it with more specific details about your application, setup instructions, and any other relevant information for developers or users.
