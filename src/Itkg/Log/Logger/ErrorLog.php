<?php

namespace Itkg\Log\Logger;

use Itkg\Log\AbstractLogger;

/**
 * Classe Logger qui écrit dans le fichier error_log
 *
 * @package \Itkg\Log\Logger
 */
class ErrorLog extends AbstractLogger
{
    /**
     * Write to error_log
     *
     * @param string $level log level
     * @param string $message message
     */
    protected function write($level, $message)
    {
        error_log($this->id . $message);
    }

}
