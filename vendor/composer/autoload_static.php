<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit76faf800ec66d4360855ff87ce5b73b5
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

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit76faf800ec66d4360855ff87ce5b73b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit76faf800ec66d4360855ff87ce5b73b5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit76faf800ec66d4360855ff87ce5b73b5::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit76faf800ec66d4360855ff87ce5b73b5::$classMap;

        }, null, ClassLoader::class);
    }
}
