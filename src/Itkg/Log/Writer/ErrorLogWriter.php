<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Writer as BaseWriter;

/**
 * Classe Writer qui écrit dans le fichier error_log
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log\Writer
 */
class ErrorLogWriter extends BaseWriter
{
    /**
     * Ecrit le log dans l'error_log
     * @param type $log
     * @param type $params
     */
    public function write($log)
    {
        $log = $this->formatter->format($log);
        
        error_log($this->id.$log);
    }

}
