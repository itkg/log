<?php

ini_set('display_errors', 1);
require_once '../vendor/autoload.php';

use Itkg;

// Itkg_cache.php contains config && debug is actived
$Itkg = new Itkg('../var/cache/Itkg_cache.php', true);

// Add Log extension
$Itkg->registerExtension(new \Itkg\Log\DependencyInjection\ItkgLogExtension());

// Load config
$Itkg->load();

// A complicated/bad way to use a logger
$logger = \Itkg::get('log.logger.display');
$formatter = \Itkg::get('log.formatter.default');
$idGenerator = \Itkg::get('log.helper.id_generator.default');
$logger
    ->setFormatter($formatter)
    ->setIdGenerator($idGenerator)
    ->load();
$logger->init('My IDENTIFIER');
$logger->notice('My Echo Writer works');

// A simple & good way to use a logger

$logger = \Itkg::get('log.factory')
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

$logger = \Itkg::get('log.factory')
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

$logger = \Itkg::get('log.factory')->getLogger(
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
