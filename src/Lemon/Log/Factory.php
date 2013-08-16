<?php

namespace Lemon\Log;

/**
 * Class factory
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 *
 * @package \Lemon\Log
 */
class Factory 
{

    /**
     * Create a specifig logger with formatter, parameters and IdGenerator
     * 
     * @param string $logger Logger ID
     * @param string $formatter Formatter ID
     * @param array $parameters Logger parameters
     * @param IdGeneratorInterface $idGenerator Specific IdGenerator
     * 
     * @return \Lemon\Log\AbstractLogger
     */
    public function getLogger($logger = '', $formatter = '', array $params = array(), IdGeneratorInterface $idGenerator = null)
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
         * On renvoie le Logger par défaut
         */              
        if(!\Lemon::has($logger)) {
            $logger = \Lemon::get('log.logger.default');
        }else {
            $logger = \Lemon::get($logger);
        }

        $logger
            ->setFormatter($formatter)
            ->setParams($params)
            ->setIdGenerator($idGenerator);
        $logger->load();
        /**
         * On renvoie le Logger défini
         */
        return $logger;
    }
}