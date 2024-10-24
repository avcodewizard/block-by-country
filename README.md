<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Block By Country Laravel Package

A simple Laravel package to block your application access by country.

## Features

- Block access to your Laravel app based on country.
- Using [ipinfo.io](https://ipinfo.io) to detect the user's country by their IP address.
- Easy configuration of blocked countries.
- Middleware-based approach, so it’s flexible and extendable.

## Installation

### Step 1: Install the package via Composer

You can install this package via Composer by running the following command in your Laravel project:
```
composer require avcodewizard/block-by-country
```

### Step 2: Publish the configuration file

The package includes a configuration file where you can define which countries to block. The configuration file will be automatically published to your Laravel app. However, if you need to update or publish it manually, you can run:

```env
php artisan vendor:publish --provider="Avcodewizard\BlockByCountry\BlockByCountryServiceProvider" --tag="config"
```

### Step 3: Update config/blockbycountry.php

In the configuration file config/blockbycountry.php, you can specify the ISO country codes that you want to block.
```php
return [
    'blocked_countries' => ['CN', 'RU', 'IR'], // Add country codes to block here.
];
```
### Step 4: Add Middleware to Routes
To block specific routes based on the user's country, simply apply the middleware block.country to any route or route group.

```php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('block.country');
```

OR

```php
Route::group(['middleware' => 'block.country'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // put all your routes inside this group ...
});
```

## Requirements
* PHP 7.4 or higher
* Laravel 8.x or higher
