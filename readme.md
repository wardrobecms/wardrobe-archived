## Wardrobe CMS

[![Latest Stable Version](https://poser.pugx.org/wardrobe/wardrobe/version.png)](https://packagist.org/packages/wardrobe/wardrobe) [![Total Downloads](https://poser.pugx.org/wardrobe/wardrobe/d/total.png)](https://packagist.org/packages/wardrobe/wardrobe)

Installing Wardrobe
---------------------------------------

Installing Wardrobe is now as simple as running `composer create-project wardrobe/wardrobe`.
After running this command, modify your `app/config/database.php` file with your database credentials and visit the site in your browser.

In the browser you will be directed to the guided install process which will:

* Prepare your database for WardrobeCMS
* Help you create your first user
* Help you set your site title, theme, and page values


Theming Wardrobe
---------------------------------------
By default, your theme files are located in `public/themes`.
You can modify these themes or create your own using the default themes as a guide.
The configuration for your themes is located in `app/config/packages/wardrobe/core/wardrobe.php` in the `theme` option.
