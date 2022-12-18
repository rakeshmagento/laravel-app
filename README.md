# Docker laravel (Nginx, MySql, PHP 8.1)
Products REST API using laravel

## Usage

To get started, make sure you have Docker installed on your system, and then clone this repository.

Step :one: Navigate to project directory and execute `sh local.sh start`, it will take some time to install Nginx, MySql and PHP 8.1.

![Containers](https://github.com/rakeshmagento/laravel-app/blob/main/containers.png)

There are few more commands to stop, rebuild and ssh into application

Stop containers `sh local.sh stop`

Rebuild containers `sh local.sh rebuild`

SSH into application `sh local.sh ssh`

Step :two: Import DB with following command, make sure to give correct path of db dump

`docker exec -i CONTAINER_ID mysql -udbuser -p#12#laravel laravel < db-import/laravel.sql`

Open browser with `http://localhost` it will show default laravel page

## API

API Rest point `http://localhost/api/products`, this will list all the records.

![Rest API](https://github.com/rakeshmagento/laravel-app/blob/main/rest-api.png)

Rest API with category filter

![Rest API](https://github.com/rakeshmagento/laravel-app/blob/main/category-filter.png)

## PHPUnit Test

SSH into application and execute `php artisan test` to execute test.

![PHPUnit](https://github.com/rakeshmagento/laravel-app/blob/main/php-unit-test.png)
