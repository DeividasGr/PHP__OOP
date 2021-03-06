<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit741f97b6399602d03369fb2fa8b89e48
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/classes',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit741f97b6399602d03369fb2fa8b89e48::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit741f97b6399602d03369fb2fa8b89e48::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit741f97b6399602d03369fb2fa8b89e48::$classMap;

        }, null, ClassLoader::class);
    }
}
