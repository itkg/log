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
    /**
     * Ecrit le log dans le syslog
     * 
     * @param string $log
     */
    public function write($log)
    {
        $log = $this->formatter->format($log);
        
        syslog(LOG_ALERT, $this->id.$log);
    }
}