<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
return [
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', false), FILTER_VALIDATE_BOOLEAN),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', '927e6615b804f61cf5f12dd2694a053742449f88ab00f5ca70cb9fb80499c99e'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            // Replace Mysql with Postgres if you are using PostgreSQL
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '3MDHaqf9NKEdXS3g',
            'database' => 'oenskeportalen_dk_db',
            // Comment out the line below if you are using PostgreSQL
            'encoding' => 'utf8',
            //'timezone' => 'UTC',
            'cacheMetadata' => true,
            'quoteIdentifiers' => true
        ],
        'debug_kit' => [
            'className' => 'Cake\Database\Connection',
            // Replace Mysql with Postgres if you are using PostgreSQL
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '3MDHaqf9NKEdXS3g',
            'database' => 'oenskeportalen_dk_db',
            // Comment out the line below if you are using PostgreSQL
            'encoding' => 'utf8',
            //'timezone' => 'UTC',
            'cacheMetadata' => true,
            'quoteIdentifiers' => true
        ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
        // Sample SMTP configuration
    'gmail' => [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => 'noreply.oenskeportalen@gmail.com',
        'password' => 'mzxuumfbtguzvxdo',
        'className' => 'Smtp',
        'tls' => true
    ]
    ],
];
