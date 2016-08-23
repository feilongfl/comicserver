FROM webdevops/php-nginx:ubuntu-16.04

RUN apt update
RUN apt install -y openssh-server
RUN apt install -y vim git wget curl tmux fish
RUN git config --global user.email "admin@comicdatabase.com"
RUN git config --global user.name "Comic DataBase"
RUN apt install -y php-curl
ADD info.php /var/www/
RUN mkdir /var/run/sshd 
RUN echo 'root:root' | chpasswd
RUN chsh -s $(which fish)
RUN sed -ri 's/^PermitRootLogin\s+.*/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -ri 's/UsePAM yes/#UsePAM yes/g' /etc/ssh/sshd_config

EXPOSE 22 80 8000 8080

CMD ["/usr/sbin/sshd", "-D"]

