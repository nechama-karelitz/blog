# Blog Application
This is a simple blog application built with Laravel. It includes basic CRUD functionality for blog posts and integrates with an external API.

## Requirements
PHP >= 8.0
Composer
Node.js & npm
SQLite (or another database if configured)

## Installation
### 1. Clone the Repository
```bash
git clone https://github.com/nechama-karelitz/blog.git
cd blog
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install JavaScript Dependencies
```bash
npm install
```
### 4. Create `.env` File
Create a `.env` file by copying from the `.env.example` template:
```bash
cp .env.example .env
```

### 5. Generate Application Key
Run the following command to generate the application key:
```bash
php artisan key:generate
```
### 6. Database Setup
If you're using SQLite, you may need to create the database file. For other databases, make sure the configuration in `.env` is correct.

Run the migrations to create tables:
```bash
php artisan migrate
```

### 7. Build Frontend Assets
```bash
npm run build
# or, for development mode:
npm run dev
```

## Running the Application
### Development Environment
In a development environment, you can use Laravel's built-in server:
```bash
php artisan serve
```
The application will be available at http://localhost:8000.

### Production Environment
For production, it is recommended to use a web server such as Nginx or Apache. Configure your web server to serve the application from the `public` directory.

#### 1. Point your server to the `public` directory of this project.
#### 2. Set up a `.env` file with production configurations (e.g., `APP_ENV=production`, `APP_DEBUG=false`).
#### 3. Use a process manager like **Supervisor** to manage background processes, such as running queue workers.
#### 4. Set up **SSL certificates** to ensure secure HTTPS traffic.
For more details, see the [Laravel deployment documentation](https://laravel.com/docs/deployment).

## Running the External API Command
To fetch posts from an external API and save them to the database, run the following command:
```bash
php artisan fetch:external-posts
```
This command retrieves posts from the API defined in `EXTERNAL_API_URL` in the `.env` file.
