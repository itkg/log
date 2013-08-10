<?php

namespace Lemon\Log\Logger;

use Lemon\Log\AbstractLogger;

/**
 * Classe Logger qui écrit dans le fichier error_log
 *
 * @package \Lemon\Log\Logger
 */
class ErrorLog extends AbstractLogger
{
    /**
     * Ecrit le log dans l'error_log
     *
     * @param string $level
     * @param string $message
     */
    protected function write($level, $message)
    {
        error_log($this->id.$log);
    }

}
