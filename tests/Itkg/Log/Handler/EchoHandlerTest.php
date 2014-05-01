<?php


namespace Itkg\Log\Handler;


/**
 * Class EchoHandlerTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class EchoHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        \Itkg\Log::$config['DEFAULT_HANDLER'] = new EchoHandler();
        \Itkg\Log::$config['LOGGER'] = 'Itkg\Log\Logger';
    }

    public function testWrite()
    {
        $logger = \Itkg\Log\Factory::getLogger();
        $msg = 'A message';
        ob_start();

        $logger->addInfo($msg);

        ob_end_flush();
        $return = ob_get_contents();

        $this->assertEquals($msg.PHP_EOL, $return);
    }
}