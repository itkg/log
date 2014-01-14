<?php

namespace ItkgTest\Log;

use Itkg\Log\Mock\Formatter;
use Itkg\Log\Mock\Writer;

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
class WriterTest extends \PHPUnit_Framework_TestCase
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
       $formatter = new Formatter;
       $parameters = array();
       $this->object = new Writer($formatter, $parameters);
        
    }

    /**
     * @covers Itkg\Log\Writer::__construct
     * @covers Itkg\Log\Writer::getFormatter
     * @covers Itkg\Log\Writer::getParameters
     */
    public function test__construct()
    {
       $formatter = new Formatter;
       $parameters = array('params');
       $this->object = new Writer($formatter, $parameters);
       $this->assertEquals($formatter, $this->object->getFormatter());
       $this->assertEquals($parameters, $this->object->getParameters());
       $this->object = new Writer($formatter);
       $this->assertEquals(array(), $this->object->getParameters());
    }
    
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Itkg\Log\Writer::init
     * 
     */
    public function testInit()
    {
        $NewId = 123;
        $this->object->init($NewId);
        
        $this->assertContains(' - ', $this->object->getId());
        $this->assertContains(strval($NewId), $this->object->getId());
        $this->assertStringEndsWith(strval($NewId), $this->object->getId());
    }

    
    /**
     * @covers Itkg\Log\Writer::setParameters
     * @covers Itkg\Log\Writer::getParameters
     * @covers Itkg\Log\Writer::loadParameters
     */
    public function testGetParameters()
    {
        $parameters = array('name' => 'test', 'sex' => 'male');
        $this->object->setParameters($parameters);
        $this->assertEquals($parameters, $this->object->getParameters());
        $this->object->loadParameters($parameters);
        $this->assertEquals($parameters, $this->object->getParameters());
        $otherParameters = array('other' => true);
        $this->object->loadParameters($otherParameters);
        $parameters = array_merge($parameters, $otherParameters);
        $this->assertEquals($parameters, $this->object->getParameters());
     }
 
     /**
     * @covers Itkg\Log\Writer::setId
     * @covers Itkg\Log\Writer::getId
     * @covers Itkg\Log\Writer::generateId
     * @covers Itkg\Log\Writer::init
     */
     public function testGetId()
     {
         $this->assertNull($this->object->getId());
         $this->object->setId(1);
         $this->assertEquals(1, $this->object->getId());
         $this->object->setId(null);
         $this->assertNull($this->object->getId());
         $this->object->init('IDENTIFIER');
         $this->assertNotEquals('IDENTIFIER', $this->object->getId());
     }

     /**
     * @covers Itkg\Log\Writer::setFormatter
     * @covers Itkg\Log\Writer::getFormatter
     */
    public function testGetFormatter()
    {
        $Formatter =  new Formatter;
        $this->object->setFormatter($Formatter);
        $this->assertEquals($Formatter, $this->object->getFormatter());
    }
}
