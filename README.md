

# Content Management with flat database, using TALL Stack

[![Latest Version on Packagist](https://img.shields.io/packagist/v/happytodev/typhoon.svg?style=typhoon-square)](https://packagist.org/packages/happytodev/typhoon)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/happytodev/typhoon/run-tests?label=tests)](https://github.com/happytodev/typhoon/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/happytodev/typhoon/Check%20&%20fix%20styling?label=code%20style)](https://github.com/happytodev/typhoon/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/happytodev/typhoon.svg?style=typhoon-square)](https://packagist.org/packages/happytodev/typhoon)

Typhoon is a way to manage your content as you want.
Why Typhoon ? Because he doesn't use database. It uses Orbit.

## Support us

[You can support the development of this open-source package here](https://github.com/sponsors/happytodev)

## Installation

Start with a fresh install of Laravel :

```bash
laravel new your-awesome-project-name
```

or 

```bash
composer create-project laravel/laravel your-awesome-project-name
```

Enter in your project directory : 

```bash
cd your-awesome-project-name
```

You can install the package via composer:

```bash
composer require happytodev/typhoon
```

As Typhoon, use `filament-navigation` plugin from Ryan Chandler and as I adapted it (fork is here https://github.com/happytodev/filament-navigation) to be compliant with Orbit (also from Ryan) and as the PR is waiting approval from Ryan, you have to set an another settings before install Typhoon.

Follow these steps :

```json
    "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/happytodev/filament-navigation"
        }
    ],
    "require": {
      "ryangjchandler/filament-navigation": "dev-main"
    }
```

Save the `composer.json` file and run `composer update`

Alternatively, if you don't add above require block in your `composer.json` file, you can install the package via composer:

```bash
composer require ryangjchandler/filament-navigation=dev-main
```

To use Orbit with filament-navigation, you have to add a key to your .env file :

```env
  FILAMENT_NAVIGATION_DB_ENGINE=orbit
```

Give a name to your website by adding the following key to your .env file

```env
TYPHOONCMS_NAME="MyWebsite"
```

You can now run the install script of Typhoon via Artisan :

```bash
php artisan typhoon:install
```

When the script ask you `User model file already exists. Do you want to overwrite it? (yes/no) [no]:` you can answer yes. It will modify the default User model to adapt it to use Orbit instead classic database like for example MySQL.



Last thing, go to the `content\users`folders and edit with your favorite editor the first user, usually it is the file `1.md`:

```md
---
id: 1
name: 'John Doe'
email: john@doe.com
password: $2y$10$0wdxKSl7ksxk8yrTgU8!K90oLmMq2eJ20pwUBSu0ICMWpc959DpTqm
is_admin: 0
created_at: 2022-05-27T18:39:22+00:00
updated_at: 2022-05-28T09:04:57+00:00
---
```

modify this line `is_admin: 0` to this one `is_admin: true` :

```md
---
id: 1
name: 'John Doe'
email: john@doe.com
password: $2y$10$0wdxKSl7ksxk8yrTgU8!K90oLmMq2eJ20pwUBSu0ICMWpc959DpTqm
is_admin: true
created_at: 2022-05-27T18:39:22+00:00
updated_at: 2022-05-28T09:04:57+00:00
---
```

# Crontabs

Typhoon has the possibity to published or unpublished posts by setting date and hour of action.
It needs you configure your crontab as explained in [laravel documentation](https://laravel.com/docs/9.x/scheduling#running-the-scheduler).

The following must be adapted to your system, but on a classical Linux : 

```bash
crontab -e
```

Then adding this and take care to adapt path of your Typhoon installation

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```


# Compile assets

Only if you need to adapt assets and compile them

Install TailwindCSS :

```bash
npm install -D tailwindcss
```

```bash
npm install @tailwindcss/typography
```

Install Npm dependencies and compile assets :
```bash
npm install && npm run dev
```

compile tailwind asset
```bash
npx tailwindcss -i ./resources/css/app.css -o ./public/css/app.css
```

## Updating

After you update TyhoonCms with `composer update` you can launch `php artisan typhoon:update`.

The script will ask you wich version you come from and adapt the update in consequence.



# How to connect
  
Now you can connect to the backoffice, via the url of your project and adding to it `/admin`

# How to use 

Out of the box, you have this entities :

- users
- posts
- categories
- tags
- pages
- navigation
- social networks

To create a post, a category is necessary. So, your first step is to create a category, before create a post.

After installation, you have demo content with :
- an home page
- your user and one more default user **john@doe.com** and password : **johndoesecret**
- a category
- a tag
- a demo post : `yourTyphoonSite.test/posts/the-first-post-with-typhoon`
- a menu
- a social network group
- a page listing all posts : `yourTyphoonSite.test/posts/`

When you create a page, you can visit it with this url : 

yourTyphoonSite.test/**page**/{slug_of_your_page}

The home page is different and is plug directly to `yourTyphoonSite.test/`

# Knowned limitations

**Don't forget : this is a beta version, please do not use it in production unless you know what you do !**

Currently there is some limitations :

- In navigations, only one menu is usable with template provided and it name MUST be `main`
- In Social Networks, the name of the group MUST also be `main`

## Testing

```bash
composer test
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/happytodev/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Frédéric Blanc](https://github.com/happytodev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


## Versionning

TyphoonCms developement follows the [SemVer](https://semver.org/) method.
