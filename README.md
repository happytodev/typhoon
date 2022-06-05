
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Content Management with flat database, using TALL Stack

[![Latest Version on Packagist](https://img.shields.io/packagist/v/happytodev/flat-cms.svg?style=flat-square)](https://packagist.org/packages/happytodev/flat-cms)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/happytodev/flat-cms/run-tests?label=tests)](https://github.com/happytodev/flat-cms/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/happytodev/flat-cms/Check%20&%20fix%20styling?label=code%20style)](https://github.com/happytodev/flat-cms/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/happytodev/flat-cms.svg?style=flat-square)](https://packagist.org/packages/happytodev/flat-cms)

Flat-Cms is a way to manage your content as you want.
Why Flat ? Because he doesn't use database. It uses Orbit.

## Support us



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

Warning : Until FlatCms is published on Packagist, you have to clone this repo somewhere on your machine and update your composer.json by adding the following under the scripts section :

```json
    "repositories": [
        {
          "type": "path",
          "url": "../../Packages/flat-cms"
        }
    ],
```

Obviously, above repositories.url depends where did you install this package. Take care of adapting the path.

You can install the package via composer:

```bash
composer require happytodev/flat-cms
```

You can now run the install script via Artisan :

```bash
php artisan flat-cms:install
```

When the script ask you `User model file already exists. Do you want to overwrite it? (yes/no) [no]:` you can answer yes. It will modify the default User model to adapt it to use Orbit instead classic database like for example MySQL.

Now you have to create the first user :

```bash
php artisan make:filament-user
```

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

modify this line `is_admin: 0` to this one `is_admin: 1` :

```md
---
id: 1
name: 'John Doe'
email: john@doe.com
password: $2y$10$0wdxKSl7ksxk8yrTgU8!K90oLmMq2eJ20pwUBSu0ICMWpc959DpTqm
is_admin: 1
created_at: 2022-05-27T18:39:22+00:00
updated_at: 2022-05-28T09:04:57+00:00
---
```

Now you can connect to the backoffice, via the url of your project and adding to it `/admin`

Out of the box, you have this entities :

- users
- posts


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Frédéric Blanc](https://github.com/happytodev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
