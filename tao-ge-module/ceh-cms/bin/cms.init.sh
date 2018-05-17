#!/bin/sh
cd ../
composer update
cd ./vendor
git clone https://github.com/t0k4rt/phpqrcode.git