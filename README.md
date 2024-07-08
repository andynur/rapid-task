# Rapid Task

This is a simple Task API project built with Laravel 10, MySQL, Pest, and utilizing the Service Repository Pattern. This project provides a RESTful API for managing tasks.

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL
- Node.js (for Laravel Mix)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/andynur/rapid-task.git
    cd rapid-task
    ```

2. Install the dependencies:

    ```bash
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure the database connection:

    ```bash
    cp .env.example .env
    ```

    Update the database credentials in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run the database migrations:

    ```bash
    php artisan migrate
    ```

6. (Optional) Seed the database:

    ```bash
    php artisan db:seed
    ```

7. Serve the application:

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000`.

## Running Tests

This project uses Pest for testing. To run the tests, use the following command:

```bash
./vendor/bin/pest
```

## Project Structure

The project follows the Service Repository Pattern. Here's a brief overview of the structure:

- **app/Http/Controllers**: Contains the controllers for handling HTTP requests.
- **app/Models**: Contains the Eloquent models.
- **app/Repositories**: Contains the repository classes.
- **app/Services**: Contains the service classes.
- **database/migrations**: Contains the database migration files.
- **tests**: Contains the test cases.

## API Endpoints

Here are some of the main API endpoints:

- `GET /api/tasks`: Retrieve a list of tasks.
- `GET /api/tasks/{id}`: Retrieve a specific task.
- `POST /api/tasks`: Create a new task.
- `PUT /api/tasks/{id}`: Update an existing task.
- `DELETE /api/tasks/{id}`: Delete a task.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss any changes.

## License

This project is open-source and licensed under the MIT License.
