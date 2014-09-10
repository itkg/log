<?php

namespace Itkg\Log;

use Itkg\Log;
use Monolog\Handler\AbstractHandler;

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
    static public function getLogger($handlers = array(), $channel = 'DEFAULT')
    {
        $logger = null;
        $logger = Builder::createLogger($channel);
        if (!is_array($handlers) || empty($handlers)) {
            $logger->pushHandler(Builder::createDefaultHandler());
            return $logger;
        }

        if(sizeof($handlers) == 1) {
            $logger->pushHandler(self::createHandler($handlers));
        } else {
            foreach ($handlers as $config) {

                $logger->pushHandler(self::createHandler($config));
            }
        }
        return $logger;
    }

    /**
     * Create handler from config
     *
     * @param array $config
     * @throws \Exception
     * @return AbstractHandler
     */
    static public function createHandler(array $config)
    {
        if(!isset($config['handler'])) {
            throw new \Exception('No handler define');
        }

        $handler = $config['handler'];
        $formatter = '';
        if (isset($config['formatter'])) {
            $formatter = $config['formatter'];
        }
        $handler->setFormatter(Builder::createFormatter($formatter));

        return $handler;
    }
}
