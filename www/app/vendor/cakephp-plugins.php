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
        'MixerApi' => $baseDir . '/vendor/mixerapi/mixerapi/',
        'MixerApi/Bake' => $baseDir . '/vendor/mixerapi/bake/',
        'MixerApi/CollectionView' => $baseDir . '/vendor/mixerapi/collection-view/',
        'MixerApi/ExceptionRender' => $baseDir . '/vendor/mixerapi/exception-render/',
        'MixerApi/HalView' => $baseDir . '/vendor/mixerapi/hal-view/',
        'MixerApi/JsonLdView' => $baseDir . '/vendor/mixerapi/json-ld-view/',
        'MixerApi/Rest' => $baseDir . '/vendor/mixerapi/rest/',
        'OenskeportalTheme' => $baseDir . '/plugins/OenskeportalTheme/',
        'SwaggerBake' => $baseDir . '/vendor/cnizzardini/cakephp-swagger-bake/',
    ],
];
