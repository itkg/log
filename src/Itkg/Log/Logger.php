<?php


namespace Itkg\Log;

use Monolog\Logger as BaseLogger;

/**
 * Class Logger
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Logger extends BaseLogger
{
    /**
     * Log ID
     *
     * @var string
     */
    protected $id = '';

    /**
     * Initialize an ID
     */
    public function init($identifier = '')
    {
        // Initializer log ID with optionnal identifier
        $this->id = $this->generateId() . ' - ' . $identifier;

        if ($identifier) {
            $this->id .= ' - ';
        }
    }

    /**
     * Adds a log record.
     *
     * @param  integer $level   The logging level
     * @param  string $message The log message
     * @param  array $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function addRecord($level, $message, array $context = array())
    {
        $context['id'] = $this->id; // Add ID in context

        return parent::addRecord($level, $message, $context);
    }

    /**
     * Get ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ID
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * génère le log id
     *
     * @return int
     */
    protected function generateId()
    {
        return IdGenerator::generate();
    }
}
