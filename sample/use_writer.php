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
$logger->write('My Echo Writer works');

// A simple & good way to use a logger

$logger = \Lemon::get('log.factory')
	->getLogger('log.logger.display');
$logger->init('My IDENTIFIER');
$logger->write('My Echo Writer works');