#!/bin/bash
clear
echo "---Now running BJBASSETT.ORG deploy script."
echo
echo
php artisan down
git stash
git pull
echo "---Pulled latest code or already up to date."
php artisan config:cache
php artisan view:cache
php artisan route:cache
echo "---Cleared all cache"
echo
echo
echo "---Done."
php artisan up
