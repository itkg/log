<?php

namespace Itkg\Log;

use Itkg\Log\Helper\IdGenerator;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Itkg\Config;

/**
 * Class Logger
 *
 * @abstract
 * 
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class AbstractLogger extends Config implements LoggerInterface 
{
    /**
     * Log levels
     * 
     * @var array
     */
    protected $levels = array(
        LogLevel::EMERGENCY,
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        LogLevel::ERROR,
        LogLevel::WARNING,
        LogLevel::NOTICE,
        LogLevel::INFO,
        LogLevel::DEBUG,
    );
    
    /**
     * ID du log
     *
     * @var int
     */
    protected $id;
  
    /**
     * Lof Formatter 
     *
     * @var Itkg\Log\AbstractFormatter
     */
    protected $formatter;

    /**
     * ID Generator
     * 
     * @var Itkg\Log\Helper\IdGeneratorInterface
     */
    protected $idGenerator;

    /**
     * Constructor
     * 
     * @param array  $params      List of parameters
     * @param AbstractFormatter $formatter   Formatter
     * @param IdGeneratorInterface $idGenerator Specific Id Generator
     */
    public function __construct(array $params = array(), AbstractFormatter $formatter = null, IdGeneratorInterface $idGenerator = null)
    {
        if(is_object($formatter)) {
            $this->setFormatter($formatter);
        }

        $this->setParams($params);
        if($idGenerator) {
            $this->setIdGenerator($idGenerator);
        }
    }

    /**
     * Init log ID
     *
     * @param string $identifier identifier concatenate to log ID
     */
    public function init($identifier)
    {
        $this->id = $this->generateId() .' - ' . $identifier;
    }

    /**
     * Getter ID
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Setter ID
     * 
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Validate required parameters
     */
    public function load()
    {
        $this->validateParams();
    }
    
    /**
     * Get formatter
     * 
     * @return Formatter 
     */
    public function getFormatter()
    {
        return $this->formatter;
    }
    
    /**
     * Set formatter
     * 
     * @param Formatter $formatter 
     */
    public function setFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;
        $this->formatter->setLogger($this);

        return $this;
    }
    
    /**
     * Get idGenerator
     * 
     * @return IdGeneratorInterface Id Generator
     */
    public function getIdGenerator()
    {
        return $this->idGenerator;
    }

    /**
     * Set idGenerator
     * @param \Itkg\Log\Helper\IdGeneratorInterface $idGenerator Id Generator
     *
     * @return AbstractLogger Current instance 
     */
    public function setIdGenerator(\Itkg\Log\Helper\IdGeneratorInterface $idGenerator)
    {
        $this->idGenerator = $idGenerator;

        return $this;
    }
    
    /**
     * generate a log ID
     * 
     * @return int
     */
    protected function generateId() 
    {
        if(!$this->idGenerator) {
            return '';
        }else {
            return $this->idGenerator->generate();
        }
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        if(!in_array($level, $this->levels)) {
            throw new \Psr\Log\InvalidArgumentException(sprintf('Level %s does not exist', $level));
        }
        $this->formatter->addParameters($context);
        $this->write($level, $this->formatter->format($message));
    }

    /**
     * Write the log
     *
     * @abstract
     * 
     * @param  string $level   log level
     * @param  string $message message to write
     */
    abstract protected function write($level, $message);
}