<?php

namespace Itkg\Log;

/**
 * Classe abstraite pour les classes de formatages de log
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @abstract
 * @package \Itkg\Log
 */
abstract class Formatter 
{
    /**
     * Liste de paramètres
     * 
     * @var array
     */
    protected $parameters;
    
    
    protected $writer;
            
    /**
     * Constructeur 
     */
    public function __construct()
    {

    }
    
    /**
     * Formate le log
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
    
    public function setWriter(\Itkg\Log\Writer $writer) 
    {
        $this->writer = $writer;
    }
    
    public function getWriter() 
    {
        return $this->writer;
    }
}