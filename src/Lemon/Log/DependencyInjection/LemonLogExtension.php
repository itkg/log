<?php

namespace Lemon\Log\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * Extension for lemon log lib
 * 
 * Class LemonLogExtension
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class LemonLogExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../../../Resources/config')
        );
        $loader->load('formatter.xml');
        $loader->load('logger.xml');
        $loader->load('helper.xml');
        $loader->load('factory.xml');
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias() 
    {
        return 'lemon_log';
    }
}