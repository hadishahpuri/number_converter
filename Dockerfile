FROM ubuntu
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y curl && curl -fsSL https://deb.nodesource.com/setup_current.x | bash && apt-get install -y nodejs php-intl

RUN apt install -y php-fpm php-common php-cgi php-mbstring php-curl php-xml php-xmlrpc php-pear nano zip unzip php-zip php-bcmath php-json

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

#install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    php -r "unlink('composer-setup.php');"
