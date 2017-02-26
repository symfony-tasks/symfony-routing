<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use BankiruSchool\Routing\Tasks\EventListener\RequestListener;
use BankiruSchool\Routing\Tasks\Factory\ArgumentResolverFactory;

final class ServiceCompilerPass extends AbstractCompilerPass
{
    protected function getListeners(): array
    {
        return [
            [RequestListener::class,'onKernelRequest']
        ];
    }

    protected function doAdditionalConfiguration(ContainerBuilder $builder)
    {
        $def = $builder->getDefinition('argument_resolver');
        $def->setFactory([ArgumentResolverFactory::class, 'createArgumentResolver']);
    }
}
