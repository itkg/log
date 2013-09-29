<?php

namespace Itkg\Log;

/**
 * Class factory
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 *
 * @package \Itkg\Log
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
     * @return \Itkg\Log\AbstractLogger
     */
    public function getLogger($logger = '', $formatter = '', array $params = array(), IdGeneratorInterface $idGenerator = null)
    {
        /**
         * Si aucun formatter n'est passé, on utilise celui par défaut
         */
        if(!\Itkg::has($formatter)) {
            $formatter = \Itkg::get('log.formatter.default');
        }else {
            $formatter = \Itkg::get($formatter);
        }

        if(!is_object($idGenerator)) {
            $idGenerator = \Itkg::get('log.helper.id_generator.default');
        }
        
        /**
         * On renvoie le Logger par défaut
         */              
        if(!\Itkg::has($logger)) {
            $logger = \Itkg::get('log.logger.default');
        }else {
            $logger = \Itkg::get($logger);
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