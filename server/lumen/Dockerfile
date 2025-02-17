FROM php:8.2-fpm
RUN apt-get update && apt-get install -y git zip unzip \
    && docker-php-ext-install pdo pdo_mysql && rm -rf /var/lib/apt/lists/*
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader
COPY . .
RUN composer require --dev phpunit/phpunit && composer dump-autoload --optimize
RUN chown -R www-data:www-data /var/www
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]