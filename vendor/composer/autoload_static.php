<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7d4a2dcd7ee261fc007e063c8296712
{
    public static $files = array (
        '99b765f9a8ea15a60012af27acbebc7a' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shamimipt\\WpCrud\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shamimipt\\WpCrud\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7d4a2dcd7ee261fc007e063c8296712::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7d4a2dcd7ee261fc007e063c8296712::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7d4a2dcd7ee261fc007e063c8296712::$classMap;

        }, null, ClassLoader::class);
    }
}
