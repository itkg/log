<?php
namespace Itkg\Log;

use Itkg\Log\Factory;
use Itkg\Log\Handler\EchoHandler;
use Monolog\Handler\StreamHandler;
use Psr\Log\LogLevel;

/**
 * Classe pour les test phpunit pour la classe Factory
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 *
 * @package \Itkg\Log
 *
 */
class LoggerTest extends \PHPUnit_Framework_TestCase
{
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = \Itkg\Log\Factory::getLogger();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{

	}

	/**
	 * Test init method
	 */
	public function testInit()
	{
		$NewId = 123;
		$this->object->init($NewId);

		$this->assertContains(' - ', $this->object->getId());
		$this->assertContains(strval($NewId), $this->object->getId());
		$this->assertStringEndsWith(strval($NewId).' - ', $this->object->getId());
	}

	/**
	 * Test get set ID
	 */
	public function testGetSetId()
	{
		$this->assertNotNull($this->object->getId()); // An id is set when logger was created
		$this->object->setId(1);
		$this->assertEquals(1, $this->object->getId());
		$this->object->setId(null);
		$this->assertNull($this->object->getId());
		$this->object->init('IDENTIFIER');
		$this->assertNotEquals('IDENTIFIER', $this->object->getId());
	}
}
