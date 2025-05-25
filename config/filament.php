<?php

return [

    'id' => 'admin',

    'path' => 'admin',

    'middleware' => [
        'web',
    ],

    'auth' => [
        'guard' => 'web',
    ],

    'providers' => [
        App\Providers\Filament\AdminPanelProvider::class,
    ],
];