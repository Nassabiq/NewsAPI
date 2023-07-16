<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Initial Guide

Before you start to develop this website, please do some commands below and please do it in order:

> **NOTE**: if there is a question to overwrite existing files or config, please answer **NO**

1. Clone This Repository

```
git clone https://github.com/Nassabiq/NewsAPI.git
```

2. Install **Composer Packages**

```
composer install
```

4. copy `.env.example` and rename it to `.env`,

```
cp .env.example .env
```

then set it with your own local environment.

5. run artisan generate app key

```
php artisan key:generate
```

6. change database name in .env file with database name in localhost

7. run this command to add laravel storage link

```
php artisan storage:link
```

8. start your database engine(mysql/postgresql) on your system, create database named `mamotodb`, and then run this command to migrate the database and seed it

```
php artisan migrate && php artisan db:seed
```

9. generate laravel passport personal client

```
php artisan passport install
```

then add the personal client id and secret in .env file

```
PASSPORT_PERSONAL_ACCESS_CLIENT_ID=your_personal_access_client
PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=your_personal_access_client_secret
```

10. And done.

Postman collection can be accessed here

```
https://anassabiq.postman.co/workspace/My-Workspaces~c5545a70-4f96-4e9e-a350-9dcb86d827a4/collection/9280138-a29cf0a8-52e4-486c-8c56-aa28ad443966?action=share&creator=9280138
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
