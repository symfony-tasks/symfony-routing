<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use BankiruSchool\Routing\Tasks\ArgumentResolverFactory;
use BankiruSchool\Routing\Tasks\KernelEvents;
use Symfony\Component\DependencyInjection\ContainerBuilder;

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
        $builder->getDefinition('argument_resolver')
            ->setFactory([ArgumentResolverFactory::class, 'instance']);
    }
}
