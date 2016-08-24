OM webdevops/php-nginx:ubuntu-16.04

RUN apt update
RUN apt install -y openssh-server
RUN apt install -y vim git wget curl tmux fish tree jq
RUN git config --global user.email "admin@comicdatabase.com"
RUN git config --global user.name "Comic DataBase"
RUN apt install -y php-curl
ADD info.php /app
ADD index.php /app
ADD run.fish /app
ADD downlist.txt /app
ADD txc.fish /app
RUN git clone https://github.com/ComicDatabase/ComicDatabase.git
RUN mv ComicDatabase /app/comic
RUN echo 'root:root' | chpasswd
RUN chsh -s $(which fish)
RUN sed -ri 's/^PermitRootLogin\s+.*/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -ri 's/UsePAM yes/#UsePAM yes/g' /etc/ssh/sshd_config

EXPOSE 22 80 8000 8080


