<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Mock\Formatter;
use Itkg\Log\Writer\EchoWriter;

/**
 * Class de test Formatter
 *
 * @author Jean-Baptiste ROUSSEAU <jean-baptiste.rousseau@businessdecision.com>
 *
 * @package \ItkgTest\Log\Writer
 */
class EchoWriterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Writer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {        
    }

    /**
     * @covers Itkg\Log\Writer\EchoWriter::__construct
     * @covers Itkg\Log\Writer\EchoWriter::getFormatter
     * @covers Itkg\Log\Writer\EchoWriter::getParameters
     */
    public function test__construct()
    {
       $formatter = new Formatter;
       $parameters = array('params');
       $this->object = new EchoWriter($formatter, $parameters);
       $this->assertEquals($formatter, $this->object->getFormatter());
       $this->assertEquals($parameters, $this->object->getParameters());
       $this->object = new EchoWriter($formatter);
       $this->assertEquals(array(), $this->object->getParameters());
    }
    
    /**
     * @covers Itkg\Log\Writer\EchoWriter::write
     * @covers Itkg\Log\Writer\EchoWriter::getFormatter
     * @covers Itkg\Log\Writer\EchoWriter::getParameters
     */
    public function testWrite()
    {
       $formatter = new Formatter;
       $parameters = array('params');
       $this->object = new EchoWriter($formatter, $parameters);
       ob_start();
       $this->object->write("test");
       $out = ob_get_contents();
       $this->assertEquals($out, $this->object->getId()."test".PHP_EOL);
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}
