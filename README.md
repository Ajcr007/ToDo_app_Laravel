# Laravel To-Do Application

This is a To-Do application built using Laravel 10. It allows users to manage their tasks efficiently with full CRUD (Create, Read, Update, Delete) functionality.

---

## Features

- Add new tasks with a title and description.
- View a list of all tasks.
- Edit task details.
- Delete tasks.
- Built with Laravel's MVC architecture and follows best practices.

---

## Installation

### Prerequisites

Make sure you have the following installed on your system:

- PHP (>= 8.1)
- Composer
- MySQL
- Node.js
- Laravel CLI

### Steps to Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/<your-username>/laravel-todo-app.git
   cd laravel-todo-app
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Set up the environment:

   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Configure the database settings in `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=todo_app
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```

4. Run migrations to set up the database:

   ```bash
   php artisan migrate
   ```

5. Start the development server:

   ```bash
   php artisan serve
   ```

6. Access the application in your browser:

   - Open [http://localhost:8000](http://localhost:8000).

---

## Usage

- **Create Task**: Click on "Add New Task" to create a new task.
- **View Tasks**: View all tasks on the homepage.
- **Edit Task**: Click the "Edit" button next to a task to update its details.
- **Delete Task**: Click the "Delete" button to remove a task.

---

## Project Structure

- **Routes**: Defined in `routes/web.php`.
- **Controllers**: Located in `app/Http/Controllers`.
- **Models**: Located in `app/Models`.
- **Views**: Blade templates are located in `resources/views`.

---

## Screenshots

*Add screenshots here to demonstrate the functionality.*

---

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add feature-name'`).
4. Push to the branch (`git push origin feature-name`).
5. Create a pull request.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Acknowledgements

Special thanks to the Laravel community for their excellent documentation and support.

