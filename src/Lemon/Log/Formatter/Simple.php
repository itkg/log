<?php

namespace Lemon\Log\Formatter;

use Lemon\Log\AbstractFormatter;

/**
 * Class Simple (No format)
 * 
 * @package \Lemon\Log\Formatter
 */
class Simple extends AbstractFormatter
{
    /**
     * Return the log without formatting
     *
     * @param string $log
     */
    public function format($log) 
    {
        return $log;
    }
}
