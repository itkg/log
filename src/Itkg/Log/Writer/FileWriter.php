<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Writer as BaseWriter;

/**
 * Classe Writer par fichier de logs
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log\Writer
 */
class FileWriter extends BaseWriter
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
            file_put_contents($this->file, $this->id.$log."\n", FILE_APPEND);
        }else {
            file_put_contents($this->file, $this->id.$log."\n");
        }
    }
}
