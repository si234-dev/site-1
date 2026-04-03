FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy files
COPY . .

# Install PHP dependencies
RUN composer install

# Create needed folders (FIX)
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 10000

# Run server
CMD php -S 0.0.0.0:10000 -t public