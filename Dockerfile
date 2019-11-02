FROM php:7.3-fpm

RUN apt-get update && apt-get install -y git

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /usr/app
COPY . .
RUN ls
RUN composer install --prefer-source --no-interaction