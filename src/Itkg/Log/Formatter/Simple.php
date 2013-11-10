<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\AbstractFormatter;

/**
 * Class Simple (No format)
 *
 * @package \Itkg\Log\Formatter
 */
class Simple extends AbstractFormatter
{
    /**
     * Return the log without formatting
     *
     * @param string $log
     * @return string
     */
    public function format($log)
    {
        return $log;
    }
}
