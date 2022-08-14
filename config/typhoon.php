<?php
// config for happytodev/Typhoon
return [

    /*
    |--------------------------------------------------------------------------
    | Template name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your theme. A theme takes place in folder
    | resources/views/{template-name}.
    |
    */
    'name' => env('TYPHOONCMS_NAME', 'Typhoon Instance'),

    /*
    |--------------------------------------------------------------------------
    | Template name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your theme. A theme takes place in folder
    | resources/views/{template-name}.
    |
    */
    'template' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Template color
    |--------------------------------------------------------------------------
    |
    | This value is the colour you want for your theme.
    | Possibles values are the main colours of tailwindcss.
    |
    */
    'template_color' => 'indigo',

    /*
    |--------------------------------------------------------------------------
    | Typhoon version number
    |--------------------------------------------------------------------------
    |
    | This value is the colour you want for your theme.
    | Possibles values are the main colours of tailwindcss.
    |
    */
    'version' => 'v0.5.4',

    /*
    |--------------------------------------------------------------------------
    | Typhoon plugins
    |--------------------------------------------------------------------------
    |
    | This array will be surcharged by config files of others plugins
    | dynamically.
    |
    */
    'plugins' => [
    ],

];
