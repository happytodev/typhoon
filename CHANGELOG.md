# Changelog

All notable changes to `typhoon` will be documented in this file.

## v0.5.6 - 2022-08-15
- remove tw-elements
- add a new menu responsive with accessible navigation adapted from [this article](https://caffeinecreations.ca/blog/accessible-dropdown-navigation-with-tailwind-css-and-alpine-js/)
- now a menu can have 2 sub-levels
- some cleaning in the code

## v0.5.5 - 2022-08-15
### Try to optimize SEO score by lazy loading images

- Add lazysizes library, 'lazyload' class to all img call and replace 'src' by 'data-src'

## v0.5.4 - 2022-08-14
- Fix pill background error

## v0.5.3 - 2022-08-14
- Fix javascript error and add new generated css file

## v0.5.2 - 2022-08-14
- Typo on version number on UpdateTyphoonPackage.php

## v0.5.1 - 2022-08-14
- Missing flash component

## v0.5.0 - 2022-08-14
- Add posts shedule / unschedule feature (need crontab edit). Fix [#41]((https://github.com/happytodev/typhoon/issues/37))
- First implementation of a plugin system in Typhoon
- Update the update script to this new version
- Increase background color in page constructor (based on Tailwind color palette)
- clean the code

## v0.4.2 - 2022-08-09
- Error with composer.json config

## v0.4.1 - 2022-08-09
- Fix few bugs
- Display videos and twitter from markdown file works now in posts and pages
- Fix problems with settings in admin due to add column type in content file but not in sqlite DB

## v0.4.0 - 2022-08-08
- Improve settings to be of multiple types (string, boolean, image, textarea, richtext)
- Introduce settings in footer and menu components

## v0.3.3 - 2022-08-07
- Improve typhoon update script to add `setting` resources

## v0.3.2 - 2022-08-07
- Improve typhoon update script to add `setting` model and content

## v0.3.1 - 2022-08-07
- Fix some errors after installation

## v0.3.0 - 2022-08-07
- Fix [#37](https://github.com/happytodev/typhoon/issues/37) :  Add pagination to posts page list
- Add typhoon:update command to help updating TyphoonCms after launch `composer update`

## v0.2.3 - 2022-08-05
- Fix a little glitch on display

## v0.2.2 - 2022-08-05
- Display optimization for code using the Prism library

After `composer update`, please launch :

```
php artisan vendor:publish --force --tag="typhoon-css"
```

## v0.2.1 - 2022-08-05
- Fix [#35](https://github.com/happytodev/typhoon/issues/35) : After release of v0.2 'code' blocks are not correctly displayed
- Add Prism to highlight code (html, css, js, php, twig, json) and some plugins : Line Highlight, Line Numbers, Show language, Toolbar, Copy to clipboard button
- Improve detections of tailwindcss instructions to compile CSS by integrating other happytodev plugins in discover parameters

After `composer update`, please launch :

```
php artisan vendor:publish --force --tag="typhoon-css"
php artisan vendor:publish --force --tag="typhoon-js"
```

## v0.2.0 - 2022-08-04
- Fix feature [#25](https://github.com/happytodev/typhoon/issues/25) : Add counter on fields with limited characters
- Fix [#21](https://github.com/happytodev/typhoon/issues/21) [#28](https://github.com/happytodev/typhoon/issues/28) [#31](https://github.com/happytodev/typhoon/issues/31) [#32](https://github.com/happytodev/typhoon/issues/32) [#33](https://github.com/happytodev/typhoon/issues/33) [#34](https://github.com/happytodev/typhoon/issues/34) : Add label before tags and show category for posts
- Fix [#2](https://github.com/happytodev/typhoon/issues/2) : Add tl;dr to post

## v0.1.18 - 2022-08-03
- Fix issue [#20](https://github.com/happytodev/typhoon/issues/20) : Tag slug is not automatically generated 
- Fix issue [#22](https://github.com/happytodev/typhoon/issues/22) : Error when launch php artisan route:list command
- Now you can give some support to Typhoon by starring it in his github repository during installation :-)

## v0.1.17 - 2022-08-02
- Fix issue [#19](https://github.com/happytodev/typhoon/issues/19) : The navigation in admin does not work correctly

## v0.1.16 - 2022-08-02
- Improve documentation and add knowed limitations after feedback of the first user

## v0.1.15 - 2022-08-02
- If a post doesn't have `main_image` don't display the correspondant div block
- Improve and simplify install from 14 steps to only 5. Now you can install Typhoon in a very short time
- Improve image component for page by authorizing full image : max-w-screen-7xl and no y-padding
- Adding demo content with user, post, comment, tag, home page, category
- Improve footer

## v0.1.14 - 2022-08-01
- Add first version of comments in Typhoon with plugin filament-comments
- Improve Author's Bio view

## v0.1.12 - 2022-07-21
- Downgrade composer PHP version required for compatibility with some shared hosts services

## v0.1.11 - 2022-07-21
- Fix css issues with Youtube and twitter

## v0.1.10 - 2022-07-21
- Move bio to the bottom of posts
- Fix a displaying bug when embed video on post

## v0.1.9 - 2022-07-20
- Add bio description for user (1200 characters max)
- Add picture field for user. If none provided, display a default avatar

## v0.1.8 - 2022-07-20
- Add the possibility to hide a page block via a toggle

## v0.1.7 - 2022-07-19
- Use Storage::url() helper for every image to avoid 404 on Shared Hosts

## v0.1.6 - 2022-07-19

### What's changed
- Try to improve installation process
- Integrate changes made on local dev project into the core project
## v0.1.0 - 2022-07-17

### What's changed
- Adding filamentphp to the package
- Improve install script
- Change name of package from `flat-cms` to `typhoon`
- Typhoon now supports users, posts, categories, tags
- First template created with `homepage` and `posts` page

### Known problems
- Error when trying to remove association between a tag and a post. Discussion in progress with the Orbit creator to find a solution. This happened in belongsToMany relation

## v0.0.1 - 2022-05-27

### What's changed

- First MVP to try Orbit in situation.
