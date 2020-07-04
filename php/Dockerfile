FROM php:7.2-apache

ENV PORT 7000

RUN apt-get update \
    && apt-get install -y --no-install-recommends apt-utils \
    && apt-get install python3 graphviz -y \
    && apt-get install git -y \
    && apt-get install -y default-mysql-client \
    && docker-php-ext-install mysqli \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt


ADD https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar /usr/local/bin/wp
RUN chmod +x /usr/local/bin/wp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer require mockery/mockery --no-scripts --no-suggest

CMD sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf \
    && docker-php-entrypoint apache2-foreground

COPY xdebug.ini /usr/local/etc/php/conf.d/

ENTRYPOINT []