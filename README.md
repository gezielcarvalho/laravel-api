<p align="center">
<a href="http://sabresoftware.com.br/" target="blank"><img src="https://user-images.githubusercontent.com/16593463/209469380-8124ba8d-79bf-419a-a157-79d2f6678621.png" width="200" alt="Nest Logo" /></a>
</p>

# Laravel API

## Description

This is a REST API developed with Laravel 10 and PHP 8. It is a simple API that allows you to register and login a user. The authentication is done with JWT over a Bearer token. All the authentication and authorization is done with the extension [Laravel Passport](https://laravel.com/docs/8.x/passport). The endpoints are protected with the middleware `auth:api` and the routes are protected with the middleware `auth` and `verified`. The API is documented with Swagger and the documentation can be found at the endpoint `/api/documentation`.

## Installation

```bash
$ git clone
$ cd laravel-api
$ composer install
$ cp .env.example .env # Edit the .env file with your database credentials
$ php artisan migrate
$ php artisan db:seed
$ php artisan passport:install
$ php artisan l5-swagger:generate
$ php artisan serve
```

## Development process

The development process was done using a simplified version of [Gitflow Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow). The main branch is `main`. The features are developed in branches named `feat/<feature-name>` and the hotfixes are developed in branches named `hotfix/<hotfix-name>`. The features and hotfixes are merged into `main` when a release is made, since this is just a demo project. In a real project, the features and hotfixes would be merged into `develop` and the `main` branch would be used only for releases.

### Before starting a new feature

```bash
$ git checkout main
$ git pull
$ git checkout -b feat/<feature-name>
```

# References

https://www.itsolutionstuff.com/post/laravel-8-rest-api-with-passport-authentication-tutorialexample.html
