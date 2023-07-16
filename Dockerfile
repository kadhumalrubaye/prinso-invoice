# Use the official PHP base image
FROM php:8.0-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the project files to the container
COPY . /var/www/html

# Install PHP dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Allow Composer plugins to run as super user
ENV COMPOSER_ALLOW_SUPERUSER 1

# Update composer.lock before installing dependencies
RUN composer update --no-scripts --no-dev --prefer-dist

# Install project dependencies
RUN composer install --no-interaction --no-scripts --no-dev --prefer-dist


# Set the correct file permissions
RUN chown -R www-data:www-data /var/www/html/storage
# Run the Vite development server...
RUN php artisan migrate
RUN npm run dev
 
# Build and version the assets for production...
RUN npm run build
# Expose the container port
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
