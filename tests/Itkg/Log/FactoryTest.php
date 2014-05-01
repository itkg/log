<?php
namespace Itkg\Log;

use Itkg\Log\Factory;
use Itkg\Log\Handler\EchoHandler;
use Monolog\Handler\StreamHandler;

/**
 * Classe pour les test phpunit pour la classe Factory
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \ItkgTest
 * 
 */
class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        \Itkg\Log::$config['DEFAULT_HANDLER'] = new EchoHandler();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

	/**
	 * Test default handler
	 */
	public function testGetDefaultHandler()
    {
	    \Itkg\Log::$config['DEFAULT_HANDLER'] = new EchoHandler();
        $logger = \Itkg\Log\Factory::getLogger();
	    $handler = $logger->popHandler();

        $this->assertEquals($handler, \Itkg\Log::$config['DEFAULT_HANDLER']);
        
        $defaultFormatterClass = \Itkg\Log::$config['FORMATTERS'][\Itkg\Log::$config['DEFAULT_FORMATTER']];
        $this->assertEquals($defaultFormatterClass, get_class($handler->getFormatter()));
        
    }
    
    /**
     * Test logger override
     */
    public function testGetLogger()
    {
        $logger = \Itkg\Log\Factory::getLogger(array());
        $defaultWriterClass = \Itkg\Log::$config['LOGGER'];
        $this->assertEquals($defaultWriterClass, get_class($logger));

	    \Itkg\Log::$config['LOGGER'] = 'Itkg\Log\NullLogger';
	    $logger = \Itkg\Log\Factory::getLogger(array());
	    $defaultWriterClass = \Itkg\Log::$config['LOGGER'];
	    $this->assertEquals($defaultWriterClass, get_class($logger));
    }

    /**
     * Test default logger with no config defined
     */
    public function testGetDefaultLoggerWithNoLoggerDefined()
    {
        \Itkg\Log::$config['LOGGER'] = null;
        try {
            $logger = \Itkg\Log\Factory::getLogger(array());
            $this->fail('An exception must be thrown because no default logger defined');
        }catch(\Exception $e){}

        \Itkg\Log::$config['LOGGER'] = 'Itkg\Log\NullLogger';
    }
    
    /**
     * test logger setting handler
     */
    public function testGetHandler()
    {
	    $testHandler = new StreamHandler('/tmp/temp.log');

	    $testFormatter = new Mock\Formatter();
        $logger = \Itkg\Log\Factory::getLogger(
	        array(
		        array(
			        'handler' => $testHandler,
			        'formatter' => $testFormatter
	            )
            )
        );
	    $handler = $logger->popHandler();

	    $this->assertEquals($testHandler, $handler);
	    $this->assertEquals($testFormatter, $handler->getFormatter());

        $testFormatter = 'string';
        $logger = \Itkg\Log\Factory::getLogger(
            array(
                array(
                    'handler' => $testHandler,
                    'formatter' => $testFormatter
                )
            )
        );
        $handler = $logger->popHandler();

        $this->assertEquals($testHandler, $handler);
        $this->assertEquals(\Itkg\Log::$config['FORMATTERS']['string'], get_class($handler->getFormatter()));

        $logger = \Itkg\Log\Factory::getLogger(
            array(
                array(
                    'handler' => $testHandler
                )
            )
        );
        $handler = $logger->popHandler();

        $this->assertEquals($testHandler, $handler);
        $this->assertEquals(\Itkg\Log::$config['FORMATTERS']['string'], get_class($handler->getFormatter()));
    }

    /**
     * test logger with unvalid config handler
     */
    public function testGetHandlerWithUnvalidConfig()
    {
        $testHandler = new StreamHandler('/tmp/temp.log');

        $testFormatter = new Mock\Formatter();

        try {
            $logger = \Itkg\Log\Factory::getLogger(
                array(
                    array(
                        'formatter' => $testFormatter
                    )
                )
            );
            $this->fail('An exception must be thrown');
        } catch (\Exception $e) {

        }
    }

    /**
     * test default handler where no default handler is defined
     */
    public function testGetDefaultHandlerWithUnvalidConfig()
    {
        \Itkg\Log::$config['DEFAULT_HANDLER'] = '';
        try {
            $logger = \Itkg\Log\Factory::getLogger(
                array(
                )
            );
            $this->fail('An exception must be thrown because no valid handler is defined');
        } catch (\Exception $e) {

        }
    }
}