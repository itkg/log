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
     * @param array $record
     */
    public function format(array $record)
    {
        return simplexml_load_string(utf8_encode($record['message']));
    }
}
