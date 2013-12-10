#!/usr/bin/env sh

php app/console --env=test doctrine:database:drop --force
php app/console --env=test doctrine:database:create
php app/console --env=test doctrine:schema:update --force
php app/console --env=test assets:install web

php bin/phpunit -c app/ --testdox