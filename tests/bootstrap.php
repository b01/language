<?php
// Load composer auto-loader.
$composerAutoLoader = __DIR__
	. DIRECTORY_SEPARATOR . '..'
	. DIRECTORY_SEPARATOR . 'vendor'
	. DIRECTORY_SEPARATOR . 'autoload.php';

if ( !file_exists($composerAutoLoader) )
{
	die( 'We cannot run unit test just yet, you must first run: composer.phar install.' );
}
require_once $composerAutoLoader;

// Add a constant with the fixtures directory path.
$fixturesPath = realpath( __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' );
define( 'FIXTURES_PATH', $fixturesPath );
?>