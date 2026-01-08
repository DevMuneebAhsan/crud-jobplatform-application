#!/bin/bash
# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install JS dependencies and build Tailwind
npm install
npm run build

# Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
php artisan migrate --force