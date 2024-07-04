#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
# When next to the final deployment, run these both and then comment out on the final commit.
php artisan migrate:refresh --force
php artisan db:seed --force