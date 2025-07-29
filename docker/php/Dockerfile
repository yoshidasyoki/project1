FROM php:8.4-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libonig-dev \
    # composerに必要なライブラリ群
    unzip zip git libzip-dev \
    # 拡張ライブラリのインストール
    && docker-php-ext-install pdo_mysql zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    # キャッシュファイルの削除
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

EXPOSE 80
