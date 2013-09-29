<?php

namespace Itkg\Log;

use Itkg\Config;

/**
 * Class AbstractFormatter
 *
 * @abstract
 * 
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class AbstractFormatter extends Config
{
    /**
     * Logger
     * 
     * @var \Itkg\Log\AbstractLogger
     */
    protected $logger;
    
    /**
     * Format
     *
     * @abstract
     * @param string $log
     */
    public abstract function format($log);
    
    /**
     * Setter Logger
     * 
     * @param \Itkg\Log\AbstractLogger $logger
     */
    public function setLogger(\Itkg\Log\AbstractLogger $logger)
    {
        $this->logger = $logger;
    }
    
    /**
     * Getter Logger
     * 
     * @return \Itkg\Log\AbstractLogger $logger
     */
    public function getLogger() 
    {
        return $this->logger;
    }
}