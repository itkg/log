<?php

namespace Itkg\Log\Logger;

use Itkg\Log\AbstractLogger;

/**
 * Display log (echo)
 *
 * @package \Itkg\Log\Logger
 */
class Display extends AbstractLogger
{
    /**
     * Display log to screen
     * 
     * @param string $level log level
     * @param string $message message
     */
    protected function write($level, $message)
    {
        echo $this->id.' - ('.$level.') '.$message.'<br />';
    }

}
