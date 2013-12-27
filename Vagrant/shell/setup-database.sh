#!/bin/bash

if [[ ! -d /.puphpet-stuff ]]; then
    php /var/www/codeconsortium.dev/www/public/app/console --env=dev doctrine:schema:create
    php /var/www/codeconsortium.dev/www/public/app/console --env=prod doctrine:schema:create
    php /var/www/codeconsortium.dev/www/public/app/console --env=test doctrine:schema:create
fi
