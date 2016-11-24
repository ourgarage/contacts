<?php

namespace Ourgarage\Contacts;

use Illuminate\Support\ServiceProvider;

class ContactsServiceProvider extends ServiceProvider
{

    public function boot(){
        require __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__.'/resources/views', 'contacts');

        $this->publishes([
            __DIR__.'/resources/images/contacts/' => base_path('public/packages/contacts'),
            __DIR__.'/resources/views/admin/' => base_path('resources/views/vendor/contacts')
        ]);

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'contacts');
    }

    public function register() {
        $this->app->make('Ourgarage\Contacts\Http\Controllers\Admin\ContactsController');
        $this->app->make('Ourgarage\Contacts\Models\Contact');
        $this->app->make('Ourgarage\Contacts\Models\Feedback');

        $this->mergeConfigFrom(__DIR__.'/config/contacts.php', 'packages');
    }
}
