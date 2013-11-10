<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\AbstractFormatter;

/**
 * Class XML
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 * @package \Itkg\Log\Formatter
 */
class XML extends AbstractFormatter
{
    /**
     * Format a SimpleXMLElement log
     *
     * @param string $log
     * @return string
     */
    public function format($log)
    {
        return simplexml_load_string(utf8_encode($log));
    }
}
