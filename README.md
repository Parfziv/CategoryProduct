# Ecommerce Project

## Installation Guide

1. **Clone the Project and `cd` into it.**

2. **Install PHP Dependencies**

```bash
composer install
```

3. **Copy `.env` file from example.**

```bash
cp .env.example .env
```

4. **Generate Application Key**

```bash
php artisan key:generate
```

5. **Edit Database Information in `.env` file.**

6. **Fresh Migrate Database**

```
php artisan migrate:fresh
```
