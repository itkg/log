<?php

namespace Itkg\Log\Logger;

use Itkg\Log\AbstractLogger;

/**
 * Classe Logger qui écrit dans le syslog
 * 
 * @package \Itkg\Log\Logger
 */
class Syslog extends AbstractLogger
{
    
    static $LEVELS = array(
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
     * Write to syslog
     * 
     * @param string $level log level
     * @param string $message message
     */
    protected function write($level, $message)
    {
        syslog(self::$LEVELS[$level], $this->id.$message);
    }
}