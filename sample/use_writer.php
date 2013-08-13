<?php

ini_set('display_errors', 1);
require_once '../vendor/autoload.php';

use Lemon;

// lemon_cache.php contains config && debug is actived
$lemon = new Lemon('../var/cache/lemon_cache.php', true);

// Add Log extension
$lemon->registerExtension(new \Lemon\Log\DependencyInjection\LemonLogExtension());

// Load config
$lemon->load();

// A complicated/bad way to use a logger
$logger = \Lemon::get('log.logger.display');
$formatter = \Lemon::get('log.formatter.default');
$idGenerator = \Lemon::get('log.helper.id_generator.default');
$logger
	->setFormatter($formatter)
	->setIdGenerator($idGenerator)
    ->load();
$logger->init('My IDENTIFIER');
$logger->notice('My Echo Writer works');

// A simple & good way to use a logger

$logger = \Lemon::get('log.factory')
	->getLogger('log.logger.display');
$logger->init('My IDENTIFIER');

$logger->notice('My Echo Writer works notice message');
$logger->init('My IDENTIFIER');
$logger->info('My Echo Writer works info message');
$logger->init('My IDENTIFIER');
$logger->debug('My Echo Writer works debug message');
$logger->init('My IDENTIFIER');
$logger->warning('My Echo Writer works warning message');
$logger->init('My IDENTIFIER');
$logger->critical('My Echo Writer works critical message');
$logger->init('My IDENTIFIER');
$logger->emergency('My Echo Writer works emergency message');
$logger->init('My IDENTIFIER');
$logger->error('My Echo Writer works error message');

echo '<br />Use default : ';

$logger = \Lemon::get('log.factory')
	->getLogger();
$logger->init('My IDENTIFIER');

$logger->notice('My Echo Writer works notice message');
$logger->init('My IDENTIFIER');
$logger->info('My Echo Writer works info message');
$logger->init('My IDENTIFIER');
$logger->debug('My Echo Writer works debug message');
$logger->init('My IDENTIFIER');
$logger->warning('My Echo Writer works warning message');
$logger->init('My IDENTIFIER');
$logger->critical('My Echo Writer works critical message');
$logger->init('My IDENTIFIER');
$logger->emergency('My Echo Writer works emergency message');
$logger->init('My IDENTIFIER');
$logger->error('My Echo Writer works error message');

$logger = \Lemon::get('log.factory')->getLogger(
	'log.logger.file', 
	'simple',
	array('file' => __DIR__.'/../var/logs/sample.log')
);

$logger->init('My IDENTIFIER');

$logger->notice('My Echo Writer works notice message');
$logger->init('My IDENTIFIER');
$logger->info('My Echo Writer works info message');
$logger->init('My IDENTIFIER');
$logger->debug('My Echo Writer works debug message');
$logger->init('My IDENTIFIER');
$logger->warning('My Echo Writer works warning message');
$logger->init('My IDENTIFIER');
$logger->critical('My Echo Writer works critical message');
$logger->init('My IDENTIFIER');
$logger->emergency('My Echo Writer works emergency message');
$logger->init('My IDENTIFIER');
$logger->error('My Echo Writer works error message');
