<?php

declare(strict_types=1);

namespace Sulu\Bundle\DynamicFormAjaxValidation;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SuluDynamicFormAjaxValidationBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        parent::loadExtension($config, $container, $builder);

        $loader = new YamlFileLoader($builder, new FileLocator(__DIR__.'/../config'));
        $loader->load('services.yaml');
    }

}