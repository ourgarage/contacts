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

        'default-settings' => [
            'meta-keywords' => 'Engin CMS, Laravel',
            'meta-description' => 'This package for Engin CMS',
            'meta-title' => 'Contacts package',
        ],
    ],
];
