<?php


namespace Itkg\Log;

use Itkg\Log\Logger as BaseLogger;

/**
 * Class NullLogger
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class NullLogger extends BaseLogger
{
    /**
     * Adds a log record.
     *
     * @param  integer $level   The logging level
     * @param  string $message The log message
     * @param  array $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function addRecord($level, $message, array $context = array())
    {
        // N'écrit pas de logs
    }
}
