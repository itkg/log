<?php

namespace Lemon\Log;

use Lemon\Config;

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
     * @var \Lemon\Log\AbstractLogger
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
     * @param \Lemon\Log\AbstractLogger $logger 
     */
    public function setLogger(\Lemon\Log\AbstractLogger $logger) 
    {
        $this->logger = $logger;
    }
    
    /**
     * Getter Logger
     * 
     * @return \Lemon\Log\AbstractLogger $logger 
     */
    public function getLogger() 
    {
        return $this->logger;
    }
}