FROM php:7.2-apache 

RUN apt-get update
RUN docker-php-ext-install pdo_mysql
RUN apt-get install zlib1g-dev
RUN docker-php-ext-install zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN a2enmod rewrite

COPY php-entrypoint.sh /var/php-entrypoint.sh
RUN chmod 0777 -R /var/php-entrypoint.sh

#ENTRYPOINT ["sh", "/var/php-entrypoint.sh"]