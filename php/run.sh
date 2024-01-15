#!/bin/sh

sleep 15

composer install

php artisan migrate:fresh --seed

/usr/bin/supervisord
