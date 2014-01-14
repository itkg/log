<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Writer as BaseWriter;

/**
 * Classe Writer qui écrit dans le syslog
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 * 
 * @package \Itkg\Log\Writer
 */
class SysLogWriter extends BaseWriter
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