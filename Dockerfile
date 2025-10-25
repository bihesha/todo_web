FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

WORKDIR /var/www/html/todo_web

COPY . /var/www/html/todo_web

RUN chown -R www-data:www-data /var/www/html/todo_web \
    && chmod -R 755 /var/www/html/todo_web

EXPOSE 80
CMD ["apache2-foreground"]
