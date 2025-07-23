FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libonig-dev \
    unzip \
    zip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mysqli zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

EXPOSE 80
