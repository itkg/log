<?php

namespace Lemon\Log;

/**
 * Classe factory pour les log\Writer
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
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
     * @param string $writter
     * @param string $formatter
     * @param array $parameters
     * 
     * @return \Itkg\Log\Writer
     */
    public static function getLogger($logger = '', $formatter = '', array $parameters = array(), IdGeneratorInterface $idGenerator = null)
    {
        /**
         * Si aucun formatter n'est passé, on utilise celui par défaut
         */
        if(!\Lemon::has($formatter)) {
            $formatter = \Lemon::get('log.formatter.default');
        }else {
            $formatter = \Lemon::get($formatter);
        }

        if(!is_object($idGenerator)) {
            $idGenerator = \Lemon::get('log.helper.id_generator.default');
        }
        
        /**
         * On renvoie le writer par défaut
         */              
        if(!\Lemon::has($logger)) {
            $logger = \Lemon::get('log.logger.default');
        }else {
            $logger = \Lemon::get($logger);
        }

        $logger
            ->setFormatter($formatter)
            ->setParameters($parameters)
            ->setIdGenerator($idGenerator);
        $logger->load();
        /**
         * On renvoie le writer défini
         */
        return $logger;
    }
}