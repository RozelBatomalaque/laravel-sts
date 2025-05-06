# sts - Laravel Project

## Prerequisites

Before setting up the project, ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/download.html) (includes PHP, MySQL, and Apache)
- [Visual Studio Code](https://code.visualstudio.com/download) (recommended code editor)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/) (>= 14.x)
- [Git](https://git-scm.com/downloads)

## Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/RozelBatomalaque/laravel-sts.git
   cd sts
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```

4. Generate an application key:
   ```
   php artisan key:generate
   ```

5. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

6. Run database migrations:
   ```
   php artisan migrate
   ```

7. Start the development server:
    ```
    php artisan serve
    ```

8. Visit `http://localhost:8000` in your browser to see the application.

## Running the Application

1. Start the Laravel development server:
   ```
   php artisan serve
   ```

2. Access the application at `http://localhost:8000`

## Additional Configuration

- To configure other services or features, refer to the Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs)

## Troubleshooting

If you encounter any issues during setup or running the application, please check the Laravel and Vue.js documentation or open an issue in this repository.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.