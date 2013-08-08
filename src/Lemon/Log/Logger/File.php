<?php

namespace Lemon\Log\Logger;

use Lemon\Log\Logger;

/**
 * Classe Writer par fichier de logs
 *
 * @package \Lemon\Log\Writer
 */
class File extends Logger
{
    /**
     * Le chemin vers le fichier de log
     *
     * @var string
     */
    protected $file;

    /**
     * Récupération des paramêtres utiles au Writer
     */
    public function load()
    {
        if(isset($this->parameters['file'])) {
            $this->file = $this->parameters['file'];
        }
    }

    /**
     * Ecrit le log dans un fichier
     *
     * @param string $log
     */
    public function write($log)
    {
        $log = $this->formatter->format($log);
        
        if(file_exists($this->file)) {
            file_put_contents($this->file, $this->id.$log.PHP_EOL, FILE_APPEND);
        }else {
            file_put_contents($this->file, $this->id.$log.PHP_EOL);
        }
    }
}
