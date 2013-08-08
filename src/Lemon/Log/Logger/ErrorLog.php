<?php

namespace Lemon\Log\Logger;

use Lemon\Log\Logger;

/**
 * Classe Writer qui écrit dans le fichier error_log
 *
 * @package \Lemon\Log\Writer
 */
class ErrorLog extends BaseWriter
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
