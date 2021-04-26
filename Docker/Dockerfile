FROM php:8.0.3-apache

RUN apt update
RUN apt install -y vim 
RUN docker-php-ext-install mysqli
#COPY ./apache/virtualhost.conf /etc/apache2/sites-enabled/000-default.conf