#!/bin/bash
clear
echo "---Now running BJBASSETT.ORG deploy script."
echo
echo
git stash
git pull
echo "---Pulled latest code or already up to date."
php artisan cache:clear
php artisan config:clear
php artisan view:clear
echo "---Cleared all cache"
echo
echo
echo "---Done."
