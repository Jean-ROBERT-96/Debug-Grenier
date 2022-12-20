FROM php:8.0-apache

WORKDIR /var/www/html
COPY . /var/www/html
COPY ./000-default.conf /etc/apache2/sites-available
COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get upgrade -y

RUN docker-php-ext-install pdo pdo_mysql


RUN cd /bin && mkdir composer && cd composer
RUN chmod 777 /bin/composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

RUN apt-get -y install unzip
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN a2enmod rewrite

RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-scripts

#RUN apt-get install openssh-server --no-dev --prefer-dist --optimize-autoloader --no-scripts

RUN wget https://phar.phpunit.de/phpunit-9.5.phar
RUN  chmod +x phpunit-9.5.phar
RUN  sudo mv phpunit-9.5.phar /usr/local/bin/phpunit
RUN  sudo apt install php-xml
RUN sudo apt-get install php-mbstring


#UNIT TESTS
RUN phpunit /.test

#RUN service ssh start
EXPOSE 22
EXPOSE 80
CMD apachectl -D FOREGROUND