<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Mock\Formatter;
use Itkg\Log\Writer\ErrorLogWriter;

/**
 * Class de test Formatter
 *
 * @author Jean-Baptiste ROUSSEAU <jean-baptiste.rousseau@businessdecision.com>
 *
 * @package \ItkgTest\Log\Writer
 */
class ErrorLogWriterTest extends \PHPUnit_Framework_TestCase
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
     * @covers Itkg\Log\Writer\ErrorLogWriter::__construct
     * @covers Itkg\Log\Writer\ErrorLogWriter::getFormatter
     * @covers Itkg\Log\Writer\ErrorLogWriter::getParameters
     */
    public function test__construct()
    {
       $formatter = new Formatter;
       $parameters = array('params');
       $this->object = new ErrorLogWriter($formatter, $parameters);
       $this->assertEquals($formatter, $this->object->getFormatter());
       $this->assertEquals($parameters, $this->object->getParameters());
       $this->object = new ErrorLogWriter($formatter);
       $this->assertEquals(array(), $this->object->getParameters());
    }
    
    /**
     * @covers Itkg\Log\Writer\ErrorLogWriter::write
     * @covers Itkg\Log\Writer\ErrorLogWriter::getFormatter
     * @covers Itkg\Log\Writer\ErrorLogWriter::getParameters
     */
    public function testWrite()
    {
       $formatter = new Formatter;
       $parameters = array('params');
       $this->object = new ErrorLogWriter($formatter, $parameters);
       ob_start();
       $this->object->write("test");
       $out = ob_get_contents();
       ob_end_clean();
       //@TODO don't know how to read syslog from PHP
       //$this->assertEquals($out, $this->object->getId()."test".PHP_EOL);
    }
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}
