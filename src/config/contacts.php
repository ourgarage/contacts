<?php

return [

    'contacts' => [

        'name' => 'contacts',

        'imageSavePath' => 'packages/contacts/images/',

        'menu' => [
            'url' => 'contacts::admin::contactsIndex',
            'caption' => 'Contacts',
            'icon' => 'fa fa-map-signs',
            'active' => 'static-pages::admin::adminContactsIndex',
        ],

//        'menu-settings' => [
//            'url' => 'static-pages::admin::get-settings',
//            'caption' => 'Contacts pages settings',
//            'icon' => 'fa fa-map-signs',
//            'active' => 'static-pages::admin::get-settings',
//        ],

        'default-settings' => [
            'meta-keywords' => 'Engin CMS, Laravel',
            'meta-description' => 'This package for Engin CMS',
            'meta-title' => 'Contacts package',
        ],
    ],
];
