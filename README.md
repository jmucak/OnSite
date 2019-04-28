## Laravel OnSite Web Application

## Installation requirements
Composer - https://getcomposer.org/download/

## Quick Start
Install dependencies
$ composer install

Create .env file and connect to database

Generate app key
$ php artisan key:generate

migrate database
$ php artisan migrate

Install npm packages
$ npm install

$ composer dump-autoload
$ php artisan db:seed

Connecting storage if not created
$php artisan storage:link

Serve application
$ php artisan serve