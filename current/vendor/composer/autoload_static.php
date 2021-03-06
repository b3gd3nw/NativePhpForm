<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0aa3e4a8ca9d64e4e8d4672d0a339380
{
    public static $classMap = array (
        'App\\Controllers\\PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'App\\Controllers\\UsersController' => __DIR__ . '/../..' . '/app/controllers/UsersController.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\Core\\Connection' => __DIR__ . '/../..' . '/core/Connection.php',
        'App\\Core\\Controller' => __DIR__ . '/../..' . '/core/Controller.php',
        'App\\Core\\Model' => __DIR__ . '/../..' . '/core/Model.php',
        'App\\Core\\QueryBuilder' => __DIR__ . '/../..' . '/core/QueryBuilder.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'App\\Core\\View' => __DIR__ . '/../..' . '/core/View.php',
        'App\\Models\\UsersModel' => __DIR__ . '/../..' . '/app/models/UsersModel.php',
        'ComposerAutoloaderInit0aa3e4a8ca9d64e4e8d4672d0a339380' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit0aa3e4a8ca9d64e4e8d4672d0a339380' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0aa3e4a8ca9d64e4e8d4672d0a339380::$classMap;

        }, null, ClassLoader::class);
    }
}
