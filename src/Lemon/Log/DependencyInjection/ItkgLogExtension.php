<?php

namespace Itkg\Log\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * Extension for Itkg log lib
 * 
 * Class ItkgLogExtension
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ItkgLogExtension extends Extension
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
        return 'Itkg_log';
    }
}