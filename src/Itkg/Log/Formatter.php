<?php

namespace Itkg\Log;

use Monolog\Formatter\FormatterInterface;

/**
 * Classe abstraite pour les classes de formatages de log
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @abstract
 * @package \Itkg\Log
 */
abstract class Formatter implements FormatterInterface
{
    /**
     * Format batch of records
     *
     * @param array $records
     * @return mixed|string
     */
    public function formatBatch(array $records)
    {
        $message = '';
        foreach ($records as $record) {
            $message .= $this->format($record);
        }

        return $message;
    }
}
