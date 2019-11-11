FROM php:7.3-fpm

RUN apt-get update \
    && apt-get install -y git screen \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /usr/app
COPY . .

RUN composer install --prefer-source --no-interaction