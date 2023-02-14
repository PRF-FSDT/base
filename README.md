# Getting started
## Prerequisites
- install PHP 8.1
- install composer

# Getting started
- clone project
- composer install
- cp .env.example .env
- php artisan key:generate
- touch database/database.sqlite
- php artisan migrate --seed
- php artisan serve

You can now access the api at:
http://127.0.0.1:8000/api