Log management library
======================

## features
* PSR-3 compliant
* Different loggers implementation (display, file, syslog, error_log, etc)
* Specific Formatter to manipulate log format

## Installation

### Installation by Composer

If you use composer, add library as a dependency to the composer.json of your application

```php
    "require": {
        ...
        "itkg/log": "dev-master"
        ...
    },

```

If you use itkg/core DIC, you can do :

```php
<?php
    // ...
    $core = new Itkg\Core('../../var/cache/itkg_cache.php', true);

    // Add extension
    $core->registerExtension(new \Itkg\Log\DependencyInjection\ItkgLogExtension());
    $core->load();

```

## Usage

* Logger

* Formatter
