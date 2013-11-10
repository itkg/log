<?php

namespace Itkg\Log;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Class factory
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 *
 * @package \Itkg\Log
 */
class Factory extends ContainerAware
{

    /**
     * Create a specific logger with formatter, parameters and IdGenerator
     *
     * @param string $logger Logger ID
     * @param string $formatter Formatter ID
     * @param array $params
     * @param IdGeneratorInterface $idGenerator Specific IdGenerator
     *
     * @internal param array $parameters Logger parameters
     * @return \Itkg\Log\AbstractLogger
     */
    public function getLogger(
        $logger = '',
        $formatter = '',
        array $params = array(),
        IdGeneratorInterface $idGenerator = null
    ) {
        /**
         * If no formatter ID we use default formatter
         */
        if (!$this->container->has($formatter)) {
            $formatter = $this->container->get('itkg_log.formatter.default');
        } else {
            $formatter = $this->container->get($formatter);
        }

        if (!is_object($idGenerator)) {
            $idGenerator = $this->container->get('itkg_log.helper.id_generator.default');
        }

        /**
         * If no logger defined we use default logger
         */
        if (!$this->container->has($logger)) {
            $logger = $this->container->get('itkg_log.logger.default');
        } else {
            $logger = $this->container->get($logger);
        }

        $logger
            ->setFormatter($formatter)
            ->setParams($params)
            ->setIdGenerator($idGenerator);
        $logger->load();

        /**
         * Return created logger
         */
        return $logger;
    }
}