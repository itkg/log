<?php

namespace Itkg;

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
        'DEFAULT_WRITER'    => 'echo',
        'DEFAULT_FORMATTER' => 'string',
        'TEMP_ROOT'         => '/tmp',
        'WRITERS'           => array(
            'syslog'    => 'Itkg\Log\Writer\SysLogWriter',
            'error_log' => 'Itkg\Log\Writer\ErrorLogWriter',
            'echo'      => 'Itkg\Log\Writer\EchoWriter',
            'soap'      => 'Itkg\Log\Writer\SoapWriter',
            'file'      => 'Itkg\Log\Writer\FileWriter'
        ),
        'FORMATTERS'        => array(
            'simple' => 'Itkg\Log\Formatter\SimpleFormatter',
            'string' => 'Itkg\Log\Formatter\StringFormatter',
            'xml'    => 'Itkg\Log\Formatter\XMLFormatter'
        ),

    );
}
