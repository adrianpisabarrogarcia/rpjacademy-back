FROM php:7.4-apache

# Instala las extensiones necesarias para Slim 4
RUN docker-php-ext-install pdo pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Habilita el módulo rewrite de Apache para el enrutamiento de Slim
RUN a2enmod rewrite

# Establece la raíz del documento como la carpeta "public" (esto es específico para Slim 4)
WORKDIR /var/www/html

# Copia el contenido de tu aplicación al contenedor
COPY . .

# Exponer el puerto 80
EXPOSE 80


#Ejecutar con
#docker-compose build
#docker-compose up -d
#Esto ejecutará composer install dentro de tu contenedor web
#docker-compose exec web composer install
#Aplicación Slim 4: Accede a tu aplicación Slim 4 desde el navegador usando http://localhost:8080.
#phpMyAdmin: Para acceder a phpMyAdmin y administrar tu base de datos MySQL, ve a http://localhost:8081.
#MySQL: Si necesitas conectarte directamente a MySQL, usa el puerto 3306 y las credenciales que especificaste en docker-compose.yml.

