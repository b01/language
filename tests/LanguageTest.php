<?php namespace Kshabazz\Tests;

use \Kshabazz\Language;

/**
 * Class LanguageTest
 *
 * @package Kshabazz\Tests
 */
class LanguageTest extends \PHPUnit_Framework_TestCase
{
	public function test_loading_a_language_file()
	{
		$lang = new Language( 'en-US', \FIXTURES_PATH );
		$actual = $lang->keyString('test');
		$this->assertEquals( 'test', $actual );
	}
}
?>