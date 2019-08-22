#! /usr/bin/bash

set -e

./vendor/bin/phpcs --colors --standard=PEAR --exclude=PEAR.Commenting.FileComment,PEAR.Commenting.ClassComment src/
./vendor/bin/phpstan --ansi analyze src/
./vendor/bin/phpunit --bootstrap ./vendor/autoload.php --colors --testdox tests/
