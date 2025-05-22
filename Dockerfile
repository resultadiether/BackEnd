FROM php:8.1-cli

# Install dependencies (for Laravel)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy your app's source code
COPY . .

# Install Composer dependencies
RUN composer install

# Expose the port (e.g., 8000 for Laravel)
EXPOSE 8000

# Start Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
