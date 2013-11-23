<?php

namespace Itkg\Log\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

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
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../../../Resources/config')
        );
        $loader->load('formatter.xml');
        $loader->load('logger.xml');
        $loader->load('helper.xml');
        $loader->load('builder.xml');
    }
}