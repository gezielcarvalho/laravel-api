<p align="center">
<a href="http://sabresoftware.com.br/" target="blank"><img src="https://user-images.githubusercontent.com/16593463/209469380-8124ba8d-79bf-419a-a157-79d2f6678621.png" width="200" alt="Nest Logo" /></a>
</p>

# Laravel API

## Description

This is a REST API developed with Laravel 10 and PHP 8. It is a simple API that allows you to create, read, update and delete users and their addresses. The authentication is done with JWT over a Bearer token. All the authentication and authorization is done with the extension [Laravel Passport](https://laravel.com/docs/8.x/passport). The endpoints are protected with the middleware `auth:api` and the routes are protected with the middleware `auth` and `verified`. The API is documented with Swagger and the documentation can be found at the endpoint `/api/documentation`.

## Installation

```bash
$ git clone
$ cd laravel-api
$ composer install
$ php artisan migrate
$ php artisan db:seed
$ php artisan passport:install
$ php artisan serve
```

## Development process

The development process was done using the [Gitflow Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow). The main branch is `main` and the development branch is `develop`. The features are developed in branches named `feat/<feature-name>` and the hotfixes are developed in branches named `hotfix/<hotfix-name>`. The features and hotfixes are merged into `develop` and the `develop` branch is merged into `main` when a release is made.
