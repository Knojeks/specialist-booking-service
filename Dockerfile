FROM php:8.4-cli AS base

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpq-dev libonig-dev libicu-dev unzip \
    && docker-php-ext-install pdo_pgsql mbstring intl \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html


FROM base AS dependencies

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

COPY src/specialist-booking-service/composer.json \
     src/specialist-booking-service/composer.lock ./

RUN composer install \
    --no-dev \
    --no-scripts \
    --prefer-dist \
    --no-interaction \
    --no-progress


FROM base AS application

COPY --from=dependencies /var/www/html/vendor ./vendor

COPY src/specialist-booking-service/artisan ./artisan
COPY src/specialist-booking-service/composer.json ./composer.json

COPY src/specialist-booking-service/app ./app
COPY src/specialist-booking-service/config ./config
COPY src/specialist-booking-service/database/migrations ./database/migrations
COPY src/specialist-booking-service/public ./public
COPY src/specialist-booking-service/resources ./resources
COPY src/specialist-booking-service/routes ./routes

COPY src/specialist-booking-service/bootstrap/app.php ./bootstrap/app.php
COPY src/specialist-booking-service/bootstrap/providers.php ./bootstrap/providers.php

RUN mkdir -p \
        bootstrap/cache \
        storage/app/private \
        storage/app/public \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache

USER www-data

EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && exec php artisan serve --host=0.0.0.0 --port=8000"]
