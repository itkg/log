<?php

namespace Itkg\Log\Handler;

use Monolog\Handler\AbstractProcessingHandler;

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
class EchoHandler extends AbstractProcessingHandler
{
    /**
     * Affiche le log à l'écran
     *
     * @param array $record
     */
    public function write(array $record)
    {
        echo $record['formatted'] . PHP_EOL;
    }
}
