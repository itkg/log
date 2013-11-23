<?php

ini_set('display_errors', 1);
require_once __DIR__.'/../vendor/autoload.php';


// Itkg_cache.php contains config && debug is actived
$core = new Itkg\Core('../var/cache/Itkg_cache.php', true);

// Add Log extension
$core->registerExtension(new \Itkg\Log\DependencyInjection\ItkgLogExtension());

// Load config
$core->load();

// A way to get logger works
$logger = $core->get('itkg_log.logger.display');
$formatter = $core->get('itkg_log.formatter.default');
$idGenerator = $core->get('itkg_log.helper.id_generator.default');
$logger = $core->get('itkg_log.builder')->create($logger, $formatter, $idGenerator);

$logger->init('My IDENTIFIER');
$logger->notice('My Echo Writer works');


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

echo '<br />Use default logger (itkg_log.logger.default) : <br />';

$logger = $core->get('itkg_log.logger.default');
$formatter = $core->get('itkg_log.formatter.default');
$idGenerator = $core->get('itkg_log.helper.id_generator.default');
$logger = $core->get('itkg_log.builder')->create($logger, $formatter, $idGenerator);

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

// Use file
$logger = $core->get('itkg_log.logger.display');
$formatter = $core->get('itkg_log.formatter.default');
$idGenerator = $core->get('itkg_log.helper.id_generator.default');

$logger = $core->get('itkg_log.builder')->create($logger, $formatter, $idGenerator, array('file' => __DIR__.'/../var/logs/sample.log'));


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
