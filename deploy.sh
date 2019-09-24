#!/bin/bash
clear
echo "Now running BJBASSETT.ORG deploy script."
echo
W
echo
git stash
git pull
echo "Pulled latest code"
php artisan cache:clear
php artisan config:clear
php artisan view:clear
echo "Cleared all cache"
