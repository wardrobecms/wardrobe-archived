## Wardrobe

[![Latest Stable Version](https://poser.pugx.org/wardrobe/wardrobe/version.png)](https://packagist.org/packages/wardrobe/wardrobe) [![Total Downloads](https://poser.pugx.org/wardrobe/wardrobe/d/total.png)](https://packagist.org/packages/wardrobe/wardrobe)

Wardrobe is designed to be a very minimal blogging platform with the primary focus on writing. Currently it is a work in progress but you are free to give it a try. (Just be warned this alpha/beta quality). If you have any issues or ideas please report them.

![Wardobe](http://wardrobecms.com/media/wardrobe-air-large.png)

## Requirements

Wardrobe has a few system requirements:

- PHP >= 5.3.7
- MCrypt PHP Extension
- PDO compliant database (SQL, MySQL, PostgreSQL, SQLite)

## Installing Wardrobe

To install Wardrobe v2 clone this repo and run `composer install` then edit app/config/database.php and insert your db details.

Finally load the site in the browser and you will be directed to the guided install process which will:

* Prepare your database for WardrobeCMS
* Help you create your first user
* Help you set your site title, theme, and page values


## Theming Wardrobe

By default, your theme files are located in `app/views/`.
You can modify these themes or create your own using the default themes as a guide.
The configuration for your themes is located in `app/config/wardrobe.php` in the `theme` option.

## Dev Notes

Manually seeding:

    php artisan migrate --seed --package=wardrobe/cabinet
