FROM php:7.1-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
COPY src/ /var/www/html/

CMD ["start-apache"]