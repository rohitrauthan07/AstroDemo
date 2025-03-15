# Project Title

A brief description of what this project does and its purpose.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/rohitrauthan07/AstroDemo.git
   ```
2. Navigate to the project directory:
   ```bash
   cd AstroDemo
   ```
3. Install dependencies:
   ```bash
   composer install
   ```
4. Set up your `.env` file:
   ```bash
   cp .env.example .env
   ```
5. Generate the application key:
   ```bash
   php artisan key:generate
   ```
6. Run migrations:
   ```bash
   php artisan migrate
   ```

For Admin We need to change in DB manually 

## Usage

To start the local development server, run:
```bash
php artisan serve
```
Then visit `http://127.0.0.1:8000` in your browser.

## Contributing

Contributions are welcome! Please read the [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
