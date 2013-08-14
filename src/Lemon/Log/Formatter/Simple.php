<?php

namespace Lemon\Log\Formatter;

use Lemon\Log\AbstractFormatter;

/**
 * Classe de formatage qui n'effectue aucun traitement
 * Renvoi le texte brut sans encodage particulier
 * 
 * @package \Lemon\Log\Formatter
 */
class Simple extends AbstractFormatter
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
