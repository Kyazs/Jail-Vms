FROM php:7.4-apache
RUN apt-get update && apt-get install -y libzip-dev zip
RUN docker-php-ext-install zip
COPY . /var/www/html
EXPOSE 80