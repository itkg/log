<?php

namespace Itkg\Log;

use Itkg\Log\IdGenerator;

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
class IdGeneratorTest extends \PHPUnit_Framework_TestCase
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
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Itkg\Log\IdGenerator::generate
     * 
     */
    public function testGenerate()
    {
        $id = IdGenerator::generate();
        //'Y-m-d H:i:s' format de la date
        $temp = explode(' ', $id);
        $date = $temp[0].' '.$temp[1];
        $this->assertNotNull(strptime($date, '%D %H:%M:%S'));
        $id = $temp[2];
        
        $this->assertEquals('#', substr($id, 0, 1));
        $value = substr($id, 1);
        $this->assertLessThanOrEqual(1000000, $value);
        $this->assertGreaterThanOrEqual(1, $value);
        
        $id = IdGenerator::generate(10, 100, '_', false);
        $this->assertEquals('_', substr($id, 0, 1));
        $value = substr($id, 1);
        $this->assertLessThanOrEqual(100, $value);
        $this->assertGreaterThanOrEqual(10, $value);
    }
}

    
