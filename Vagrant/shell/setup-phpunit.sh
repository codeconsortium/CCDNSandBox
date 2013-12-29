#!/bin/bash

if [[ ! -d /.ccdn-stuff ]]; then
    mkdir /.ccdn-stuff
    echo "Created directory /.ccdn-stuff"
fi

if [[ ! -f /.ccdn-stuff/setup-phpunit ]]; then
    echo "Running initial phpunit setup"

	wget https://phar.phpunit.de/phpunit.phar
	chmod +x phpunit.phar
	mv phpunit.phar /usr/local/bin/phpunit

	touch /.ccdn-stuff/setup-phpunit
	echo "Finished running initial phpunit setup"

fi

