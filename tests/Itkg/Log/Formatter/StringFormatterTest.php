<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\Formatter\StringFormatter;

/**
 * Classe pour les test phpunit pour la classe StringFormatter
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \ItkgTest\Log\Formatter
 * 
 */
class StringFormatterTest extends \PHPUnit_Framework_TestCase
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
        $this->object = new StringFormatter();
    }

    /**
     * @covers Itkg\Log\Formatter\StringFormatter::format
     */
    public function testFormat()
    {
        $text = "it's a test";
        $this->assertEquals($text, $this->object->format(array('message' => $text)));
        
        $text = "it's a test with éàêâ";
        $this->assertEquals('UTF-8', mb_detect_encoding($this->object->format(array('message' => $text))));
        
        $text = "it is a new text";
        $textEncodeUtf8 = utf8_encode($text);
        $this->assertEquals($textEncodeUtf8, $this->object->format(array('message' => $text)));
        
        $this->assertEquals($text, utf8_decode($this->object->format(array('message' => $text))));
        
    }
}