<?php

namespace Lemon\Log\Formatter;

use Lemon\Log\Formatter as BaseFormatter;

/**
 * Classe de formatage XMLFormatter
 * Transforme une chaine en objet simpleXML
 *
 * @package \Lemon\Log\Formatter
 */
class XML extends BaseFormatter
{
    /**
     * Formate le log
     *
     * @param string $log
     */
    public function format($log)
    {
        return simplexml_load_string(utf8_encode($log));
    }
}
