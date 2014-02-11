<?php
namespace ItkgTest\Log;

use Itkg\Log\Mock\Formatter;
use Itkg\Log\Mock\Writer;

/**
 * Class de test Formatter
 *
 * @author Jean-Baptiste ROUSSEAU <jean-baptiste.rousseau@businessdecision.com>
 *
 * @package \Itkg\Log
 */
class FormatterTest extends \PHPUnit_Framework_TestCase
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
        $this->object = new Formatter();
    }

    /**
     * @covers Itkg\Log\Formatter::getParameters
     */
    public function testGetParameters()
    {
        $params = array("test");
        $this->object->setParameters($params);
        $this->assertEquals($this->object->getParameters(), $params );
    }

    /**
     * @covers Itkg\Log\Formatter::setParameters
     */
    public function testSetParameters()
    {
        $params = array("test");
        $this->object->setParameters($params);
        $this->assertEquals($this->object->getParameters(), $params );
    }
        /**
     * @covers Itkg\Log\Formatter::getWriter
     */
    public function testGetWriter()
    {
        $params = new Writer($this->object);
        $this->object->setWriter($params);
        $this->assertEquals($this->object->getWriter(), $params );
    }

    /**
     * @covers Itkg\Log\Formatter::setWriter
     */
    public function testSetWriter()
    {
        $params = new Writer($this->object);
        $this->object->setWriter($params);
        $this->assertEquals($this->object->getWriter(), $params );
    }
}