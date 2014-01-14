<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\Formatter as BaseFormatter;

/**
 * Classe de formatage StringFormatter
 * Encode les logs en utf_8
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log\Formatter
 */
class StringFormatter extends BaseFormatter
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
