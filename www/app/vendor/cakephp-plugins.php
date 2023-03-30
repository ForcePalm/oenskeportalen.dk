<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'AdminTheme' => $baseDir . '/plugins/AdminTheme/',
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'OenskeportalTheme' => $baseDir . '/plugins/OenskeportalTheme/',
    ],
];
