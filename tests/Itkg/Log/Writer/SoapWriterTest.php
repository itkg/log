<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Mock\Formatter;
use Itkg\Log\Writer\SoapWriter;

/**
 * Class de test Formatter
 *
 * @author Jean-Baptiste ROUSSEAU <jean-baptiste.rousseau@businessdecision.com>
 *
 * @package \ItkgTest\Log\Writer
 */
class SoapWriterTest extends \PHPUnit_Framework_TestCase
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
     * @covers Itkg\Log\Writer\SoapWriter::__construct
     * @covers Itkg\Log\Writer\SoapWriter::getFormatter
     * @covers Itkg\Log\Writer\SoapWriter::getParameters
     */
    public function test__construct()
    {
       $formatter = new Formatter;
       $parameters = array('params');
       $this->object = new SoapWriter($formatter, $parameters);
       $this->assertEquals($formatter, $this->object->getFormatter());
       $this->assertEquals($parameters, $this->object->getParameters());
       $this->object = new SoapWriter($formatter);
       $this->assertEquals(array(), $this->object->getParameters());
    }
    
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}
