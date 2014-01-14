<?php
namespace Itkg\Log;

use Itkg\Log\Factory;

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
        
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Itkg\Log\Factory::getWriter
     */
    public function testGetDefaultWriter()
    {
        $writter = \Itkg\Log\Factory::getWriter();
        $defaultWriterClass = \Itkg\Log::$config['WRITERS'][\Itkg\Log::$config['DEFAULT_WRITER']];
        $this->assertEquals($defaultWriterClass, get_class($writter));
        
        $defaultFormatterClass = \Itkg\Log::$config['FORMATTERS'][\Itkg\Log::$config['DEFAULT_FORMATTER']];
        $this->assertEquals($defaultFormatterClass, get_class($writter->getFormatter()));
        
    }
    
    /**
     * @covers Itkg\Log\Factory::getWriter
     */
    public function testGetWriter()
    {
        $writter = \Itkg\Log\Factory::getWriter('echo', 'simple');
        $defaultWriterClass = \Itkg\Log::$config['WRITERS']['echo'];
        $this->assertEquals($defaultWriterClass, get_class($writter));
        
        $defaultFormatterClass = \Itkg\Log::$config['FORMATTERS']['simple'];
        $this->assertEquals($defaultFormatterClass, get_class($writter->getFormatter()));
    }
    
    /**
     * @covers Itkg\Log\Factory::getWriter
     */
    public function testGetWriterParameters()
    {
        $writter = \Itkg\Log\Factory::getWriter('echo', 'simple', array('file' => 'error.log'));
        $parameters = $writter->getParameters();
        $this->assertEquals('error.log', $parameters['file']);
    }
}