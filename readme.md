# Package Contacts for Engin CMS
### Installation manual for developer
* Insert the file `composer.json` next string:
```
"require": {
        "ourgarage/contacts": "dev-master"
    },
```
* Add a file `composer.json` next block:
```
"repositories": [
        {
            "type": "git",
            "url": "git@github.com:ourgarage/contacts.git"
        }
    ],
```
* Run `php composer.phar update`
* Add in your `config/app.php` file in providers:
```
Ourgarage\Contacts\ContactsServiceProvider::class,
```
* Run `php artisan vendor:publish`
```
* Run `php artisan migrate`
```