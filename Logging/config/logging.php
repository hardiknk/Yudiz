<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            // 'channels' => ['single', 'daily','custom_log'],
            // 'channels' => ['single','browser','example-custom-channel'],
            'channels' => ['single', 'custom_register'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/single_log_cal.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            // 'tap' => [App\Logging\CustomizeFormatter::class],
            // 'locking' => false,
            // 'bubble' => false, //another file log is not genrate like after signle daily file not not genrate
        ],

        'custom_register' => [
            'driver' => 'single',
            'path' => storage_path('logs/register_error.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel_daily.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
            // 'locking'=>false,

        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
        ],

        'papertrail' => [
            'driver' => 'monolog',
            // 'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'deprecations' => [
            'driver' => 'single',
            'path' => storage_path('logs/php-deprecation-warnings.log'),
        ],

        'custom_log' => [
            'driver' => 'single',
            'path' => storage_path('logs/custom_log.log'),
        ],

        'browser' => [
            'driver' => 'monolog',
            'handler' => Monolog\Handler\BrowserConsoleHandler::class,
            'formatter' => Monolog\Formatter\HtmlFormatter::class,
            'formatter_with' => [
                'dateFormat' => 'Y-m-d',
            ],

        ],


        //create the custom channel 
        'example-custom-channel' => [
            'driver' => 'custom',
            'via' => App\Logging\CustomizeFormatter::class,
        ],


        //monolog handle channel
        'logentries' => [
            'driver'  => 'monolog',
            'handler' => Monolog\Handler\SyslogUdpHandler::class,
            'with' => [
                'host' => 'http://127.0.0.1:8000',
                'port' => '8000',
            ],
        ],
    ],

];
