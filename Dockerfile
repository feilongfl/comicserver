FROM thomasvan/ubuntu16-magentoce2-nginx-php7-supervisord-ssh

RUN apt update
RUN apt install -y vim git wget curl tmux fish
RUN git config --global user.email "admin@comicdatabase.com"
RUN git config --global user.name "Comic DataBase"
RUN apt install -y php-curl
ADD info.php /var/www/html/
RUN chsh -s $(which fish)

EXPOSE 22 80 8000 8080 443 9011 2222


