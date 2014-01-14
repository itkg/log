<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Writer as BaseWriter;

/**
 * Classe Writer par echo
 * Affiche le log directement à l'écran
 * Utile pour la phase de dev
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log\Writer
 */
class EchoWriter extends BaseWriter
{
    /**
     * Affiche le log à l'écran
     * 
     * @param string $log
     * @param array $params
     */
    public function write($log)
    {
        $log = $this->formatter->format($log);
        
        echo $this->id.$log.PHP_EOL;
    }

}
