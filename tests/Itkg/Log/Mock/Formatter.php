<?php

namespace Itkg\Log\Mock;

use Itkg\Log\Formatter as BaseFormatter;

/**
 * Implementation de Formatter (Mock)
 *
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \ItkgTest\Mock
 */

class Formatter extends BaseFormatter
{
   
    public function format(array $record)
    {
        return $record['message'];
    }
}
