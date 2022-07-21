# Changelog

All notable changes to `typhoon` will be documented in this file.

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
