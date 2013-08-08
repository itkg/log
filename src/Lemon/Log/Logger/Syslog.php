<?php

namespace Lemon\Log\Logger;

use Lemon\Log\Logger;

/**
 * Classe Logger qui écrit dans le syslog
 * 
 * @package \Lemon\Log\Logger
 */
class Syslog extends Logger
{
    
    CONST LEVELS = array(
        'emergency' => LOG_EMERG,
        'alert'     => LOG_ALERT,
        'critical'  => LOG_CRIT,
        'error'     => LOG_ERR,
        'warning'   => LOG_WARNING,
        'notice'    => LOG_NOTICE,
        'info'      => LOG_INFO,
        'debug'     => LOG_DEBUG
    );

    /**
     * Ecrit le log dans le syslog
     *
     * @param string $level
     * @param string $message
     */
    protected function write($level, $message)
    {
        syslog(LEVELS[$level], $this->id.$log);
    }
}