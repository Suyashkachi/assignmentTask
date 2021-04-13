composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan optimize
php artisan view:cache
php artisan storage:link
chmod -R 777 storage/
composer dump-autoload