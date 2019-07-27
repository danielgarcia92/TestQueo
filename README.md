# Docker, Laravel

> Knowledge test: CRUD Module with Laravel 5.8, TDD, Docker, CSRF Protection, Blade, Tinker, Eloquent and Seeders

## Considerations

> You have to create 2 databases; one for the project and the another one to use TDD.

``` bash
CREATE DATABASE queo;
CREATE DATABASE queo_test;
```

## Build Setup

``` bash
docker-compose up -d
```

## Test-driven development TDD

> To use TDD you need to migrate both databases.
> In the File application/.env, change DB_DATABASE=queo_test (line 12).
> Then type in the console:

``` bash
./develop art migrate
./develop test 
```

> Then change again DB_DATABASE=queo (as it was). It is just the first time, you don't need change the DB everytime, don't worry.

### Additional information about containers creation

``` bash

# Create a laravel application using a container
docker run --rm -it \
-v $(pwd):/opt \
-w /opt \
--network pruebacrud_queo \
pruebacrud_php \
composer create-project laravel/laravel application

# Install predis/predis package with Composer
docker run --rm -i -t \
-v $(pwd)/application:/opt \
-w /opt \
--network pruebacrud_queo \
pruebacrud_php \
composer require predis/predis

# Install Laravel auth
docker run --rm -i -t \
-v $(pwd)/application:/opt \
-w /opt \
--network pruebacrud_queo \
pruebacrud_php \
php artisan make:auth

# Migrate DB
docker run --rm -i -t \
-v $(pwd)/application:/opt \
-w /opt \
--network pruebacrud_queo \
pruebacrud_php \
php artisan migrate

```


