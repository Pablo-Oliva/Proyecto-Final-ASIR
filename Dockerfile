# Usamos una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalamos extensiones para conectar con MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiamos el código de nuestra web al contenedor
COPY . /var/www/html/

# 4. NUEVO: Le damos los permisos correctos al usuario de Apache (www-data)
RUN chown -R www-data:www-data /var/www/html/ && chmod -R 755 /var/www/html/

# Exponemos el puerto 80
EXPOSE 80
