<?php

namespace Lemon\Log\Logger;

use Lemon\Log\Logger;

/**
 * Classe Logger par echo
 * Affiche le log directement à l'écran
 * Utile pour la phase de dev
 *
 * @package \Lemon\Log\Logger
 */
class Display extends Logger
{
    /**
     * Affiche le log à l'écran
     * 
     * @param string $level
     * @param string $message
     */
    protected function write($level, $message)
    {
        echo $this->id.' - ('.$level.') '.$message.'<br />';
    }

}
