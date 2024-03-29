<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88b6ae3c7ca9b09e142002ff0667ed3b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88b6ae3c7ca9b09e142002ff0667ed3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88b6ae3c7ca9b09e142002ff0667ed3b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit88b6ae3c7ca9b09e142002ff0667ed3b::$classMap;

        }, null, ClassLoader::class);
    }
}
