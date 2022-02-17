<?php
 
namespace App\Logging;


use Monolog\Formatter\LineFormatter;
use Monolog\Logger as MonologLogger;

class CustomizeFormatter
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        // dd($logger);
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                '[%datetime%] %channel%.%level_name%: %message% %context% %extra%'
            ));
        }

        // return new MonologLogger($logger);
    }
}