FROM php:8.2.12-cli

# Install system dependencies required for Laravel and Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www

# Copy Composer files first to leverage Docker caching
COPY composer.json composer.lock ./

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --verbose

# Now copy the rest of the application code
COPY . .

# Expose Laravel development server port
EXPOSE 8000

# Start Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
