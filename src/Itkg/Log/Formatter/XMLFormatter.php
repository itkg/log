<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\Formatter as BaseFormatter;

/**
 * Classe de formatage XMLFormatter
 * Transforme une chaine en objet simpleXML
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log\Formatter
 */
class XMLFormatter extends BaseFormatter
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
