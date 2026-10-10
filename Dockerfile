FROM php:8.3-cli
RUN apt-get update && apt-get install -y libsqlite3-dev libzip-dev unzip && docker-php-ext-install pdo_sqlite zip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN touch database/database.sqlite && php artisan migrate --force
EXPOSE 8000
CMD ["php","artisan","serve","--host=0.0.0.0","--port=8000"]
