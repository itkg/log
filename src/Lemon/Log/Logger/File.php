<?php

namespace Itkg\Log\Logger;

use Itkg\Log\AbstractLogger;

/**
 * Classe Logger par fichier de logs
 *
 * @package \Itkg\Log\Logger
 */
class File extends AbstractLogger
{
    /**
     * Le chemin vers le fichier de log
     *
     * @var string
     */
    protected $file;

    /**
     * Required parameters
     * 
     * @var array
     */
    protected $requiredParams = array(
        'file'
    );

    /**
     * {@inheritdoc}
     */
    public function load()
    {
        $this->file = $this->params['file'];
        parent::load();
    }

    /**
     * Write to file
     * 
     * @param string $level log level
     * @param string $message message
     */
    protected function write($level, $message)
    {
        if(file_exists($this->file)) {
            file_put_contents($this->file, $this->id.$message.PHP_EOL, FILE_APPEND);
        }else {
            file_put_contents($this->file, $this->id.$message.PHP_EOL);
        }
    }
}
