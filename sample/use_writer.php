<?php

ini_set('display_errors', 1);
require_once '../vendor/autoload.php';


// Itkg_cache.php contains config && debug is actived
$Itkg = new Itkg\Core('../var/cache/Itkg_cache.php', true);

// Add Log extension
$Itkg->registerExtension(new \Itkg\Log\DependencyInjection\ItkgLogExtension());

// Load config
$Itkg->load();

// A complicated/bad way to use a logger
$logger = $itkg->get('itkg_log.logger.display');
$formatter = $itkg->get('itkg_log.formatter.default');
$idGenerator = $itkg->get('itkg_log.helper.id_generator.default');
$logger
    ->setFormatter($formatter)
    ->setIdGenerator($idGenerator)
    ->load();
$logger->init('My IDENTIFIER');
$logger->notice('My Echo Writer works');

// A simple & good way to use a logger

$logger = $itkg->get('itkg_log.factory')
    ->getLogger('itkg_log.logger.display');
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

$logger = $itkg->get('log.factory')
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

$logger = $itkg->get('itkg_log.factory')->getLogger(
    'itkg_log.logger.file',
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
