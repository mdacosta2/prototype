# Lafourchette Prototype

Read [Functional documentation](doc/index.md)

# Crontab

The system need a crontab to work properly.

* * * * * if [ $(ps aux | grep "prototype/console" | grep -v grep | wc -l) -lt 1 ] ; then /var/www/lafourchette-prototype/console prototype:get-vm-id | xargs -P 4 -n 1 -r /var/www/lafourchette-prototype/console prototype:check ; fi;

This crontab will check each VM to verify if one need to be started, or is they have expired...

# See also

See also: https://docs.google.com/a/lafourchette.com/document/d/11e9pBdeqv3Wtt0y9FXcka26nb2vH6zc96TVDjz3unWA/edit#
