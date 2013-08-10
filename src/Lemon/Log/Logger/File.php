<?php

namespace Lemon\Log\Logger;

use Lemon\Log\AbstractLogger;

/**
 * Classe Logger par fichier de logs
 *
 * @package \Lemon\Log\Logger
 */
class File extends AbstractLogger
{
    /**
     * Le chemin vers le fichier de log
     *
     * @var string
     */
    protected $file;

    protected $requiredParams = array(
        'file'
    );

    /**
     * Récupération des paramêtres utiles au Logger
     */
    public function load()
    {
        $this->file = $this->params['file'];
    }

    /**
     * Ecrit le log dans un fichier
     *
     * @param string $level
     * @param string $message
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
