#!/bin/bash

# Install dependencies
# older ubuntus
#apt-get install build-essential libsqlite3-dev ruby1.9.1-dev
# xenial
apt install build-essential libsqlite3-dev ruby-dev

# Install the gem
gem install mailcatcher

# Make it start on boot
echo "@reboot root $(which mailcatcher) --ip=0.0.0.0" >> /etc/crontab
update-rc.d cron defaults

# Make php use it to send mail
# older ubuntus
#echo "sendmail_path = /usr/bin/env $(which catchmail) -f 'www-data@localhost'" >> /etc/php5/mods-available/mailcatcher.ini
# xenial
echo "sendmail_path = /usr/bin/env $(which catchmail) -f 'www-data@localhost'" >> /etc/php/7.0/mods-available/mailcatcher.ini

# Notify php mod manager (5.5+)
# older ubuntus
#php5enmod mailcatcher
# xenial
phpenmod mailcatcher

# Start it now
/usr/bin/env $(which mailcatcher) --ip=0.0.0.0
