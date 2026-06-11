FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libicu-dev \
    unzip \
    zip \
    default-mysql-client \
    && docker-php-ext-install mysqli pdo pdo_mysql intl

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data writable

RUN sed -i 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
