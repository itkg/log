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
     * @return \Itkg\Log\Logger
     */
    public static function getLogger(array $handlers = array(), $channel = 'DEFAULT')
    {
        $logger = null;
        $logger = Builder::createLogger($channel);
        if(!is_array($handlers) || empty($handlers)) {
            $logger->pushHandler(Builder::createDefaultHandler());
            return $logger;
        }

        foreach($handlers as $h) {
            if(isset($h['handler'])) {
                $handler = $h['handler'];
                $formatter = '';
                if(isset($h['formatter'])) {
                    $formatter = $h['formatter'];
                }
                $handler->setFormatter(Builder::createFormatter($formatter));
                $logger->pushHandler($handler);
            }
        }

        return $logger;
    }
}