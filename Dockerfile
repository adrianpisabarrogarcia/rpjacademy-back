FROM php:8.1-apache

# Instala las extensiones necesarias para Slim 4
RUN docker-php-ext-install pdo pdo_mysql

# Instala las extensiones necesarias para ejecutar composer
RUN apt-get update && \
    apt-get install -y zip unzip

RUN apt-get update && \
    apt-get install -y git


# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Opcional: configurar opciones de Apache si es necesario
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Habilita el módulo rewrite de Apache para el enrutamiento de Slim
RUN a2enmod rewrite

# Establece la raíz del documento como la carpeta "public" (esto es específico para Slim 4)
WORKDIR /var/www/

# Copia el contenido de tu aplicación al contenedor
COPY . /var/www/.

# Exponer el puerto 80
EXPOSE 80

# Ejecuta composer update para instalar las dependencias de tu aplicación
RUN composer update


#Ejecutar con
#docker-compose build
#docker-compose up -d
#docker-compose exec web composer update
#Aplicación Slim 4: Accede a tu aplicación Slim 4 desde el navegador usando http://localhost:8080.
#phpMyAdmin: Para acceder a phpMyAdmin y administrar tu base de datos MySQL, ve a http://localhost:8081.
#MySQL: Si necesitas conectarte directamente a MySQL, usa el puerto 3306 y las credenciales que especificaste en docker-compose.yml.

