<?php

namespace Lemon\Log\Logger;

use Lemon\Log\Logger;

/**
 * Classe Writer par echo
 * Affiche le log directement à l'écran
 * Utile pour la phase de dev
 *
 * @package \Lemon\Log\Writer
 */
class Display extends Logger
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
        
        echo $this->id.$log.'<br />';
    }

}
