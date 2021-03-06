<?php


namespace Itkg\Log;

use Itkg\Log;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractHandler;

/**
 * Class Builder
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Builder
{
    /**
     * Create default handler based on config
     *
     * @throws \Exception
     * @return AbstractHandler
     */
    public static function createDefaultHandler()
    {
        if (!isset(Log::$config['DEFAULT_HANDLER']) || !is_object(Log::$config['DEFAULT_HANDLER'])) {
            throw new \Exception('No default Handler defined, please set Itkg\Log::$config[\'DEFAULT_HANDLER\'] variable');
        }

        $handler = Log::$config['DEFAULT_HANDLER'];
        $handler->setFormatter(new Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']]());

        return $handler;
    }

    /**
     * Create a logger instance
     *
     * @param string $channel Logger channel
     * @return \Itkg\Log\Logger
     * @throws \Exception
     */
    public static function createLogger($channel)
    {
        if (!isset(Log::$config['LOGGER'])) {
            throw new \Exception('Please define a default logger');
        }

        $logger = new Log::$config['LOGGER']($channel);
        $logger->init();

        return $logger;
    }

    /**
     * Create a formatter based on formatter key
     * If no formatter key is defined, default formatter is used instead
     *
     * @param string $formatter
     * @return FormatterInterface
     */
    public static function createFormatter($formatter = null)
    {
        if (is_scalar($formatter) && isset(Log::$config['FORMATTERS'][$formatter]) && !is_object(Log::$config['FORMATTERS'][$formatter])) {
            return new Log::$config['FORMATTERS'][$formatter];
        } elseif (is_object($formatter)) {
            return $formatter;
        } elseif (isset(Log::$config['FORMATTERS'][$formatter]) && is_object(Log::$config['FORMATTERS'][$formatter])) {
            return Log::$config['FORMATTERS'][$formatter];
        }

        if (isset(Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']]) && is_object(Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']])) {
            return Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']];
        }

        return new Log::$config['FORMATTERS'][Log::$config['DEFAULT_FORMATTER']]();
    }
}
