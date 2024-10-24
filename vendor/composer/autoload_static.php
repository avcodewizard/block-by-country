<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1cb9e03f30e6cdc5ac04688dfe7dc85
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Avcodewizard\\BlockByCountry\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Avcodewizard\\BlockByCountry\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite1cb9e03f30e6cdc5ac04688dfe7dc85::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1cb9e03f30e6cdc5ac04688dfe7dc85::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1cb9e03f30e6cdc5ac04688dfe7dc85::$classMap;

        }, null, ClassLoader::class);
    }
}
