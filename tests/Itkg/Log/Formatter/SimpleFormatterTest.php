<?php

namespace Itkg\Log\Formatter;

use Itkg\Log\Formatter\SimpleFormatter;

/**
 * Classe pour les test phpunit pour la classe SimpleFormatter
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \ItkgTest\Log\Formatter
 * 
 */
class SimpleFormatterTest extends \PHPUnit_Framework_TestCase
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
        $this->object = new SimpleFormatter();
    }

    /**
     * @covers Itkg\Log\Formatter\SimpleFormatter::format
     */
    public function testFormat()
    {
        $text = "it's a test";
        $this->assertEquals($text, $this->object->format($text));
    }
}