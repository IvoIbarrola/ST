# Imagen base con Apache y PHP
FROM php:8.2-apache

# Instalación de extensiones requeridas por PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configuración del DocumentRoot a /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Actualización del VirtualHost de Apache para apuntar a la carpeta "public"
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Habilita el módulo de reescritura (útil para frameworks PHP)
RUN a2enmod rewrite

# Copiar archivos de la app al contenedor (esto puede ser sobreescrito por volumen)
COPY . /var/www/html
