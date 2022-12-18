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
