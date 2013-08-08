<?php

namespace Lemon\Log;

/**
 * Class Formatter
 *
 * @abstract
 * 
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Formatter
{
	/**
     * Array of parameters
     * 
     * @var array
     */
    protected $parameters;
    
    /**
     * Logger
     * 
     * @var \Lemon\Log\Logger
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
     * Getter parameters
     * 
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    
    /**
     * Setter parameters 
     * 
     * @param array $parameters
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;
    }
    
    /**
     * Setter Logger
     * 
     * @param \Lemon\Log\Logger $logger 
     */
    public function setLogger(\Lemon\Log\Logger $logger) 
    {
        $this->logger = $logger;
    }
    
    /**
     * Getter Logger
     * 
     * @return \Lemon\Log\Logger $logger 
     */
    public function getLogger() 
    {
        return $this->logger;
    }
}