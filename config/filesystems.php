<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    /*
    Symbolic Links explanation (by Lucas Roman):

    Are directs access to the stored files, since these can't be accessed directly from outside, so you need create a links to these files.

    Associative array 'links':

    'key (public_path)': Is the path to 'ecommerce/public' folder.

    'value (storage_path)': Is the path to 'ecommerce/storage/app' folder.

    The real files are stored in storage_path and the direct access in public_path.

    For 'local' disk DON'T TRY TO SAVE FILES IN 'storage/app/public/avatars' the documentation says that but is wrong. Just save it in 'app/avatars'.

    SHOW IMAGES IN VIEWS: to show image files in views use url() or asset() helpers. E.g.:

    <img src="{{ url(Auth::user()->avatar) }}"> or
    <img src="{{ asset(Auth::user()->avatar) }}

    Note: press Ctrl + F5 if don't see image updated. Sometimes you seed cached views.

    DATABASE FORMAT STORE:
    For example for: 'avatar' column in your 'users' table you should save 'avatars/1.jpg'
    
    Use 'storeAs' function in controller to save with custom folder and custom name file.
    */

    'links' => [
        // app/public/storage  => app/storage/app/public
        public_path('avatars') => storage_path('app\avatars'),
    ],

];
