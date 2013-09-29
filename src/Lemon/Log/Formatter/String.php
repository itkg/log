<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\AbstractFormatter;

/**
 * Class String
 * 
 * @package \Itkg\Log\Formatter
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class String extends AbstractFormatter
{
    /**
     * UTF-8 encode the log
     *
     * @param string $log
     */
    public function format($log)
    {
        return utf8_encode($log);
    }
}
