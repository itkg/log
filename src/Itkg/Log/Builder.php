<?php

namespace Itkg\Log;

use Itkg\Log\Helper\IdGenerator;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Class factory
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 *
 * @package \Itkg\Log
 */
class Builder
{

    /**
     * Create logger and init it with formatter, id generator and parameters
     *
     * @param AbstractLogger $logger Logger instance
     * @param AbstractFormatter $formatter Log Formatter (can format log style)
     * @param IdGenerator $generator Specifi id generator (create Id for a log)
     * @param array $params List of logger parameters
     * @return AbstractLogger
     */
    public function create(AbstractLogger $logger, AbstractFormatter $formatter, IdGenerator $generator = null, $params = array())
    {
        $logger
            ->setFormatter($formatter)
            ->setParams($params);

        if ($generator) {
            $logger->setIdGenerator($generator);
        }
        $logger->load();

        /**
         * Return initialised logger
         */
        return $logger;
    }
}