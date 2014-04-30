<?php

namespace Itkg;

use Itkg\Log\Handler\EchoHandler;

/**
 * Contient les paramètres de la librairie Itkg\Log
 * Les paramêtres par défaut de la librairie sont définis ici
 *
 * @author Pascal DENIS pascal.denis@businessdecision.com
 */
class Log
{
    /**
     * Conteneur de paramêres
     *
     * @static
     * @var array
     */
    public static $config = array(
        'LOG_PATH'          => '/var/logs',
        'DEFAULT_WRITER'    => '', // A Log Handler instance
        'DEFAULT_FORMATTER' => 'string',
        'TEMP_ROOT'         => '/tmp',
        'FORMATTERS'        => array(
            'simple' => 'Itkg\Log\Formatter\SimpleFormatter',
            'string' => 'Itkg\Log\Formatter\StringFormatter',
            'xml'    => 'Itkg\Log\Formatter\XMLFormatter'
        ),
        'LOGGER' => 'Itkg\Log\Logger'
    );
}
