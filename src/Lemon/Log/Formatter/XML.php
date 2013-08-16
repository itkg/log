<?php

namespace Lemon\Log\Formatter;

use Lemon\Log\AbstractFormatter;

/**
 * Class XML
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 * @package \Lemon\Log\Formatter
 */
class XML extends AbstractFormatter
{
    /**
     * Format a SimpleXMLElement log 
     *
     * @param string $log
     */
    public function format($log)
    {
        return simplexml_load_string(utf8_encode($log));
    }
}
