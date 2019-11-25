#!/bin/bash

echo Installing composer dependencies...
composer install
composer dump-autoload

echo Provisioning database in SQLite...
php -f app/db/provision-database.php type=down
php -f app/db/provision-database.php type=up

echo Done!
