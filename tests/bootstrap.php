<?php

ini_set('display_errors', 'on');

$loader = require_once('vendor/autoload.php');

$loader->add('Itkg\\Log', array(
    __DIR__.'/../src',
    __DIR__.'/../tests'
));

$loader->add('Itkg\\Log', array(
    __DIR__.'/../src',
    __DIR__.'/../tests'
));
