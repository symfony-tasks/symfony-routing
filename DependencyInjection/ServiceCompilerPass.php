<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use BankiruSchool\Routing\Tasks\KernelEvents;
use BankiruSchool\Routing\Tasks\ResponseFactoryResolver;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

final class ServiceCompilerPass extends AbstractCompilerPass
{
    protected function getListeners(): array
    {
        return [
            [KernelEvents::class, 'request']
        ];
    }

    protected function doAdditionalConfiguration(ContainerBuilder $builder)
    {
        $builder->register('response_factory_resolver', ResponseFactoryResolver::class);
        $builder->register('request_value_resolver', ArgumentResolver\RequestValueResolver::class);
        $builder->register('request_attribute_value_resolver', ArgumentResolver\RequestAttributeValueResolver::class);

        $resolverDefinition = $builder->getDefinition('argument_resolver');
        $arguments = $resolverDefinition->getArguments();

        $arguments[0] = $arguments[0] ?? null;
        $arguments[1] = array_merge(
            array_key_exists(1, $arguments) ? $arguments[1] : [],
            [
                new Reference('response_factory_resolver'),
                new Reference('request_attribute_value_resolver'),
                new Reference('request_value_resolver'),
            ]
        );
        $resolverDefinition->setArguments($arguments);
    }
}
