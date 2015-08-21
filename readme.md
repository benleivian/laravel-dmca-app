# Laracasts - DMCA App

## [Install Laravel](https://laracasts.com/series/build-your-first-app-in-laravel/episodes/2)

Install using composer

    laravel new dmca-app

Adjust `.env` as needed

## [Initial Routing and View Setup](https://laracasts.com/series/build-your-first-app-in-laravel/episodes/3)

Create a controller for Pages

    php artisan make:controller PagesController --plain

## [Database Setup and Authentication](https://laracasts.com/series/build-your-first-app-in-laravel/episodes/4)

Clear any compiled configuration data

    php artisan clear-compiled

Migrate database

    php artisan migrate

Install [Forms & HTML](http://laravelcollective.com/docs/5.1/html) component

## [Notices](https://laracasts.com/series/build-your-first-app-in-laravel/episodes/5)

Create a controller for Notices

    php artisan make:controller NoticesController --plain

## [Elixr](https://laracasts.com/series/build-your-first-app-in-laravel/episodes/6)

Fix gulp-notify error on homestead

    sudo apt-get install libnotify-bin

Install [browsersync for elixr](https://github.com/anheru88/laravel-elixir-browser-sync)

    npm install laravel-elixir-browsersync --save-dev