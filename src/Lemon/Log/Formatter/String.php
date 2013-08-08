<?php

namespace Lemon\Log\Formatter;

use Lemon\Log\Formatter as BaseFormatter;

/**
 * Classe de formatage StringFormatter
 * Encode les logs en utf_8
 *
 * @package \Itkg\Log\Formatter
 */
class String extends BaseFormatter
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
