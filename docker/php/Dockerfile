FROM php:8.4-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libzip-dev \
    # 拡張ライブラリのインストール
    && docker-php-ext-install pdo_mysql zip \
    # キャッシュファイルの削除
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

EXPOSE 80
