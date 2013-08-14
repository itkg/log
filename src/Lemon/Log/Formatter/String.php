<?php

namespace Lemon\Log\Formatter;

use Lemon\Log\AbstractFormatter;

/**
 * Classe de formatage StringFormatter
 * Encode les logs en utf_8
 *
 * @package \Lemon\Log\Formatter
 */
class String extends AbstractFormatter
{
    /**
     * Formate le log
     *
     * @param string $log
     */
    public function format($log)
    {
        return utf8_encode($log);
    }
}
