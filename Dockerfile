FROM php:7.2.30-apache

RUN docker-php-ext-install mysqli
