FROM php:8.2-apache

# 1. Install system packages (libpq-dev is required for Postgres)
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libpq-dev \
    curl

# 2. Install PHP extensions (pdo_pgsql is the key here)
RUN docker-php-ext-install pdo pdo_pgsql

# 3. Install Node.js (for Tailwind)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# 4. Apache Configuration
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf
RUN a2enmod rewrite

# 5. Set Working Directory
WORKDIR /var/www/html

# 6. Copy Application Files
COPY . .

# 7. Install PHP Dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 8. Install Node Dependencies & Build Tailwind
RUN npm install
RUN npm run build

# 9. Set Permissions (Crucial for Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 10. Copy and Run the Entrypoint Script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]