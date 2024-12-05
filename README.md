# Blog CMS with Laravel Livewire and Filament Admin Panel

This is an open-source blog content management system (CMS) built using Laravel, Livewire, and the Filament Admin Panel. It provides a user-friendly interface for managing blog posts, categories, and users.

## Features

- **Blog Management**: Easily create, edit, and delete blog posts.
- **Category Management**: Organize posts into categories.
- **Responsive Design**: Accessible on both desktop and mobile devices.
- **Real-time Updates**: Powered by Laravel Livewire for dynamic, real-time updates without page reloads.

## Requirements

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- Node.js & NPM
- MySQL or any other supported database

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/blog-cms.git
   cd blog-cms
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment setup:**

   Copy the `.env.example` file to `.env` and update the database and other necessary configurations.

   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**

   ```bash
   php artisan migrate
   ```

6. **Seed the database (optional):**

   ```bash
   php artisan db:seed
   ```

7. **Serve the application:**

   ```bash
   php artisan serve
   ```

8. **Access the application:**

   Open your browser and go to `http://localhost:8000`.

## Creating Admin User

To create an admin user for the Filament admin panel, run:

```bash
php artisan make:filament-user
```



## Usage

- **Admin Panel**: Access the admin panel at `/admin` to manage users, posts, and categories.
- **Authentication**: Use the default login credentials provided in the database seeder or create a new user via the admin panel.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Acknowledgements

- [Laravel](https://laravel.com/)
- [Livewire](https://laravel-livewire.com/)
- [Filament Admin Panel](https://filamentphp.com/)
