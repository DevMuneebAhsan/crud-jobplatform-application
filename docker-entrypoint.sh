#!/bin/bash

# 1. Run Migrations (Safe for Postgres - only updates changes)
echo "Running migrations..."
php artisan migrate --force

# 2. Optimization/Caching
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Start Apache
echo "Starting Apache..."
exec apache2-foreground