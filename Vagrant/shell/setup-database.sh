#!/bin/bash

if [[ ! -d /.ccdn-stuff ]]; then
    mkdir /.ccdn-stuff
    echo "Created directory /.ccdn-stuff"
fi

if [[ ! -f /.ccdn-stuff/setup-database ]]; then
    echo "Running initial database setup"

	php /var/www/codeconsortium.com/public/app/console --env=dev doctrine:schema:create
	php /var/www/codeconsortium.com/public/app/console --env=prod doctrine:schema:create
	php /var/www/codeconsortium.com/public/app/console --env=test doctrine:schema:create

	touch /.ccdn-stuff/setup-database
	echo "Finished running initial database setup"

fi

