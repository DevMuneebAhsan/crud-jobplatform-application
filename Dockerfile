# Use PHP with Apache as the base image
FROM php:8.2-apache

# 1. Install development packages and dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libpq-dev \
    libsqlite3-dev \
    curl

# 2. Install PHP extensions (including PDO for SQLite and Postgres)
RUN docker-php-ext-install pdo pdo_sqlite pdo_pgsql

# 3. Install Node.js (Version 18) for Tailwind CSS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# 4. Set Apache to point to Laravel's public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 5. Enable Apache Rewrite Module
RUN a2enmod rewrite

# 6. Set working directory
WORKDIR /var/www/html

# 7. Copy application files
COPY . .

# 8. Install PHP Dependencies (Composer)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 9. Install Node Dependencies and Build Tailwind
RUN npm install
RUN npm run build

# 10. Fix Permissions for Laravel Storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 11. Create an empty SQLite database file (if using SQLite)
# RUN touch /var/www/html/database/database.sqlite
# RUN chown www-data:www-data /var/www/html/database/database.sqlite