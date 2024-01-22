<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Pagination View
    |--------------------------------------------------------------------------
    |
    | This option controls the default pagination view that will be used
    | by the framework.
    |
    */

    // 'default' => 'tailwind',
    'default' => 'bootstrap-4',

    /*
    |--------------------------------------------------------------------------
    | Pagination View Paths
    |--------------------------------------------------------------------------
    |
    | Here you may specify the paths to the pagination views. The default
    | views use Tailwind CSS components to create a beautiful pagination
    | display.
    |
    */

    'paths' => [
        resource_path('views/vendor/pagination'),
    ],

];