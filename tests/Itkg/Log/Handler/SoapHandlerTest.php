<?php


namespace Itkg\Log\Handler;


/**
 * Class SoapHandlerTest
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class SoapHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    /**
     * Test constructor
     */
    public function testConstruct()
    {
        $folder = '/tmp/';
        $file = 'test.log';
        $handler = new SoapHandler($folder, $file);

        $this->assertEquals($folder, $handler->getFolder());
        $this->assertEquals($file, $handler->getFile());

        $handler = new SoapHandler($folder);
        $this->assertNotEmpty($handler->getFile());
        $handler->setFile($file);
        $this->assertEquals($file, $handler->getFile());

    }

    /**
     * Test write content
     */
    public function testWrite()
    {
        $folder = '/tmp/';
        $file = 'test.log';
        $handler = new SoapHandler($folder, $file);
        $message = 'A message';
        $handler->write(array('formatted' => $message));
        $this->assertTrue(file_exists($folder.$file));
        $this->assertEquals($message, file_get_contents($folder.$file));
    }

}