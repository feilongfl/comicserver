FROM ubuntu

RUN apt update
RUN apt install -y openssh-server
RUN apt install -y vim git wget curl tmux fish
RUN apt install -y php-gd php-mysql php-curl
RUN mkdir /var/run/sshd 
RUN echo 'root:root' |chpasswd
RUN sed -ri 's/^PermitRootLogin\s+.*/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -ri 's/UsePAM yes/#UsePAM yes/g' /etc/ssh/sshd_config

EXPOSE 22 80 8000 8080

CMD ["/usr/sbin/sshd", "-D"]

