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
    public static function getLogger(array $handlers, $channel = 'DEFAULT')
    {
        $logger = null;
        if(is_array($handlers)) {
            $logger = new \Itkg\Log\Logger($channel);
            $logger->init();
            if(!empty($handlers)) {
                foreach($handlers as $h) {
                    if(isset($h['handler'])) {
                        $handler = $h['handler'];
                        if(isset($h['formatter'])) {
                            $formatter = self::getFormatter($h['formatter']);
                        }else {
                            $formatter = new Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']]();
                        }
                        $handler->setFormatter($formatter);
                        $logger->pushHandler($handler);
                    }
                }
            }else {
                if(isset(Log::$config['DEFAULT_HANDLER']) && is_object(Log::$config['DEFAULT_HANDLER'])) {
                    $handler = Log::$config['DEFAULT_HANDLER'];
                    $handler->setFormatter(new Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']]());
                    $logger->pushHandler($handler);
                }
            }
        }

        return $logger;
    }

    /**
     * Renvoie un log formatter
     * - Si $formatter est une clé, on ira chercher la classe associée dans la liste des formatters
     * - Sinon on renvoie le formatter tel quel
     *
     * @param mixed $formatter
     * @return mixed
     */
    protected static function getFormatter($formatter)
    {

        if (is_scalar($formatter) && isset(Log::$config['FORMATTERS'][$formatter])) {
            return new Log::$config['FORMATTERS'][$formatter];
        }

        return $formatter;
    }
}