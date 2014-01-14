<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\Formatter\XMLFormatter;

/**
 * Classe pour les test phpunit pour la classe XMLFormatter
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \ItkgTest\Log\Formatter
 * 
 */
class XMLFormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var XMLFormatter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new XMLFormatter();
    }

    /**
     * @covers Itkg\Log\Formatter\XMLFormatter::format
     */
    public function testFormat()
    {
        $text = "<itsatest>test with éàêâ</itsatest>";
               
        $testXml = simplexml_load_string(utf8_encode($text));
        $this->assertEquals($testXml, $this->object->format($text));
    }
}