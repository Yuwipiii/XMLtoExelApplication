FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Copy existing application directory permissions
COPY . /var/www
COPY .env.docker /var/www/.env


# Install Composer dependencies
RUN cd /var/www && composer install --no-interaction --optimize-autoloader --no-dev


# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
