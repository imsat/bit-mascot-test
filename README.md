# Test project for Bit Mascot

This project combines Laravel as the backend framework with bootstrap + jQuery for the frontend. Follow the instructions below to set up and run the project.

## Prerequisites

- [PHP](https://www.php.net/) (>= 8.2)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) or another database of your choice

## Getting Started

1. **Clone the repository:**

   ```bash
   https://github.com/imsat/bit-mascot-test.git

2. **Install Laravel dependencies:**

    ```bash
   composer install

3. **Install Laravel dependencies:**

    ```bash
    cp .env.example .env

4. **Update the database configuration in the .env file:**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=your_database_host
    DB_PORT=your_database_port
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

5. **Update the mail configuration in the .env file:**
    ```bash
    MAIL_MAILER=mail_service_name
    MAIL_HOST=your_mail_host
    MAIL_PORT=your_mail_port
    MAIL_USERNAME=your_mail_username
    MAIL_PASSWORD=your_mail_password
    MAIL_ENCRYPTION=your_mail_encription
    MAIL_FROM_ADDRESS=your_mail_from_address

6. **Generate the application key:**
    ```bash
    php artisan key:generate

7. **Run database migrations and seed data:**
    ```bash
    php artisan migrate --seed

8. **Create the symbolic link for storage:**
    ```bash
    php artisan storage:link

## Running the Application

9. **Run the Laravel development server:**
    ```bash
    php artisan serve

10. **Access the application in your browser:**

Open your browser and navigate to http://127.0.0.1:8000 or desired port show in your terminal.

11. The login page for the application will be shown. Enter the application with the credentials listed below.
- Email
  ```
  admin@localhost.local
  ```
- Password
  ```
  admin
  ```


   
   
    
