#!/bin/bash
clear
echo "---Now running BJBASSETT.ORG deploy script."
echo
echo
php artisan down
git stash
git pull
clear
echo "---Pulled latest code or already up to date."
php artisan migrate
php artisan config:cache
php artisan view:cache
php artisan route:cache
composer dumpautoload
echo "---Cleared all cache"
echo "---Done."
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
php artisan up
