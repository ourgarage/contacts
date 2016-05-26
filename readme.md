# Package Statis-Pages for Engin CMS
### Installation manual for developer
* Insert the file `composer.json` next string:
```
"require": {
        "ourgarage/static-pages": "dev-develop"
    },
```
* Add a file `composer.json` next block:
```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ourgarage/static-pages.git"
        }
    ],
```
* Run `php composer.phar update`
* Add in your `config/app.php` file in providers:
```
Ourgarage\StaticPages\StaticPagesServiceProvider::class,
```
