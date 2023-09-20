# EZV TASK PI

EZV Task Application is a simple web application built with Laravel for managing tasks. Users can create, view, update, and delete tasks, making it easy to keep track of their to-do lists.

## Features

-   Task API.
-   Service repository architecture.
-   Unit test with [PEST](https://pestphp.com/).

## Technologies Used

-   Laravel 10: The PHP framework used to build the application.
-   MySQL: The database management system.
-   Composer: PHP package manager.
-   Artisan: Laravel's command-line tool.
-   Laravel Repository Service Pattern: [Read More](https://yaza-putu.github.io/).

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/andynur/ezv-test.git
    ```

2. Navigate to the project directory:

    ```bash
    cd ezv-test
    ```

3. Install composer dependencies:

    ```bash
    composer install
    ```

4. Copy the .env.example file to .env and configure your database settings:

    ```bash
    cp .env.example .env
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Migrate the database & seed data:

    ```bash
    php artisan migrate:fresh --seed
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

8. Access the application in your web browser at http://localhost:8000.

## Test (WIP)

My test methodology uses unit tests in core business rules using PEST library.

```bash
    ./vendor/bin/pest
```

Result:

```bash

   PASS  Tests\Unit\ExampleTest
   ✓ that true is true                                                                                                                                0.01s

   PASS  Tests\Feature\ExampleTest
  ✓ it returns a successful response                                                                                                                 0.17s

   PASS  Tests\Feature\Http\Controllers\UserControllerTest
  ✓ example                                                                                                                                          0.01s

  Tests:    3 passed (3 assertions)
  Duration: 0.30s
```

## API Documentation

To view the project's API documentation, you can access it through Postman Collection [here](https://documenter.getpostman.com/view/19148174/2s9YCAPpEC).

## Contributing

If you'd like to contribute to this project, please follow these steps:

-   Fork the repository.
-   Create a new branch for your feature or bug fix: git checkout -b feature/your-feature-name.
-   Make your changes and commit them: git commit -m "Add your feature".
-   Push to the branch: git push origin feature/your-feature-name.
-   Create a pull request.
-   License
-   This project is open-source and available under the MIT License.

## Contact

If you have any questions or issues, please feel free to contact me at andynur.id@gmail.com.
