<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\Formatter as BaseFormatter;

/**
 * Classe de formatage qui n'effectue aucun traitement
 * Renvoi le texte brut sans encodage particulier
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 * 
 * @package \Itkg\Log\Formatter
 */
class SimpleFormatter extends BaseFormatter
{
    /**
     * Formate le log
     *
     * @param string $log
     */
    public function format($log) 
    {
        return $log;
    }
}
