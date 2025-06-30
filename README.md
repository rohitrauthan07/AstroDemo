# AstroDemo - Laravel Web Application

A modern web application built with Laravel framework featuring user authentication, admin dashboard, and category management system.

## 🚀 Features

- **User Authentication System**
  - User registration and login
  - Password reset functionality
  - Profile management

- **Admin Dashboard**
  - User management
  - Category and subcategory management
  - CRUD operations for categories

- **Modern UI**
  - Built with Bootstrap 5
  - Tailwind CSS integration
  - Responsive design

- **Development Tools**
  - Vite for asset compilation
  - SASS support
  - Hot module replacement

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Frontend**: Bootstrap 5, Tailwind CSS
- **Build Tool**: Vite
- **Database**: MySQL/SQLite
- **Authentication**: Laravel UI

## 📋 Prerequisites

Before running this application, make sure you have the following installed:

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL or SQLite database

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/rohitrauthan07/AstroDemo.git
   cd AstroDemo
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   - Update your `.env` file with database credentials
   - Or use SQLite for development:
     ```bash
     touch database/database.sqlite
     ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

## 🚀 Usage

### Development Server

Start the development server with hot reloading:
```bash
composer run dev
```

This command will start:
- Laravel development server
- Vite development server
- Queue listener
- Log viewer

### Production

For production deployment:
```bash
npm run build
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

## 📁 Project Structure

```
AstroDemo/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
├── resources/
│   ├── views/             # Blade templates
│   ├── css/              # Stylesheets
│   └── js/               # JavaScript files
├── routes/                # Application routes
└── storage/               # Application storage
```

## 🔐 Authentication

The application includes a complete authentication system:

- **Registration**: Users can create new accounts
- **Login**: Secure user authentication
- **Password Reset**: Email-based password recovery
- **Profile Management**: Users can update their profiles

## 👨‍💼 Admin Features

Admin users have access to:

- **User Management**: View and manage user accounts
- **Category Management**: Create, read, update, delete categories
- **Subcategory Management**: Organize content with subcategories
- **Dashboard**: Overview of system statistics

## 🧪 Testing

Run the test suite:
```bash
php artisan test
```

## 📝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## 🤝 Support

If you encounter any issues or have questions, please:

1. Check the [Issues](https://github.com/rohitrauthan07/AstroDemo/issues) page
2. Create a new issue if your problem isn't already listed
3. Contact the maintainer

## 🙏 Acknowledgments

- [Laravel](https://laravel.com/) - The web framework used
- [Bootstrap](https://getbootstrap.com/) - CSS framework
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [Vite](https://vitejs.dev/) - Build tool

---

**Made with ❤️ by Rohit Singh using Laravel**
