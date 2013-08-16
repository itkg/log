<?php

ini_set('display_errors', 'on');

$loader = require_once('vendor/autoload.php');

$loader->add('Lemon\\Log', array(
    __DIR__.'/../src',
    __DIR__.'/../tests'
));

$loader->add('Lemon\\LogTest', array(
    __DIR__.'/../tests'
));