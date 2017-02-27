<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use BankiruSchool\Routing\Tasks\ArgumentResolverFactory;
use BankiruSchool\Routing\Tasks\RequestListener;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ServiceCompilerPass extends AbstractCompilerPass
{
    protected function getListeners(): array
    {
        return [
            [RequestListener::class, 'onKernelRequest'],
        ];
    }

    protected function doAdditionalConfiguration(ContainerBuilder $builder)
    {
        $definition = $builder->getDefinition('argument_resolver');
        $definition->setFactory([ArgumentResolverFactory::class, 'createArgumentResolver']);
    }
}
