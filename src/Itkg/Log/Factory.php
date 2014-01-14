<?php

namespace Itkg\Log;

use Itkg\Log;
/**
 * Classe factory pour les log\Writer
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log
 */
class Factory 
{

    /**
     * Renvoi le writer passé en paramètre
     * ou celui par défaut si aucun n'est spécifié
     * Appel la méthode load du logger créé avant de le retourner
     *
     * @static
     * @param string $writer
     * @param string $formatter
     * @param array $parameters
     *
     * @return \Itkg\Log\Writer
     */
    public static function getWriter($writer = '', $formatter = '', array $parameters = array())
    {
        /**
         * Si aucun formatter n'est passé, on utilise celui par défaut
         */
        if(!isset(Log::$config['FORMATTERS'][$formatter])) {
                $formatter = new Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']]();
        }else {
            $formatter = new Log::$config['FORMATTERS'][$formatter]();
        }

        /**
         * On renvoie le writer par défaut
         */              
        if(!isset(Log::$config['WRITERS'][$writer])) {
            return new \Itkg\Log::$config['WRITERS'][Log::$config['DEFAULT_WRITER']]($formatter);
        }

        $writer = new Log::$config['WRITERS'][$writer]($formatter, $parameters);
        $writer->load();
        /**
         * On renvoie le writer défini
         */
        return $writer;
    }
}