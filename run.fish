#!/usr/bin/env fish
/opt/docker/bin/entrypoint.sh
rsyslogd
cron
touch /var/log/cron.log
tail -F /var/log/syslog /var/log/cron.log
/usr/sbin/sshd start
