<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Loader Type
    |--------------------------------------------------------------------------
    |
    | This value determines which type of loader to use by default.
    | Options: 'simple', 'advanced'
    |
    */
    'type' => env('LOADER_TYPE', 'simple'),

    /*
    |--------------------------------------------------------------------------
    | Simple Loader Default Settings
    |--------------------------------------------------------------------------
    |
    | Default settings for the simple loader component.
    |
    */
    'simple' => [
        'min_show_time' => 1000,
        'color' => '#000000',
        'text' => 'Loading...',
        'shape' => 'circle',
        'styling' => [
            'font_size' => '16px',
        ],
        'position' => 'center',
    ],

    /*
    |--------------------------------------------------------------------------
    | Advanced Loader Settings
    |--------------------------------------------------------------------------
    |
    | Settings for the advanced loader system.
    |
    */
    'advanced' => [
        'random_selection' => true,
        'default_type' => 'text',
        'tables' => [
            'configs' => 'loader_configs',
            'contents' => 'loader_contents',
            'stylings' => 'loader_stylings',
            'relations' => 'loader_relations',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Settings
    |--------------------------------------------------------------------------
    |
    | Settings for the loader admin interface.
    |
    */
    'admin' => [
        'route_prefix' => 'loader/admin',
        'middleware' => ['web', 'auth'],
    ],
];
