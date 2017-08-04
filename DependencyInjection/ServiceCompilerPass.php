<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use BankiruSchool\Routing\Tasks\ArgumentValueResolver\ResponseFactoryValueResolver;
use BankiruSchool\Routing\Tasks\Listener\RouterListener;
use Symfony\Component\DependencyInjection\Argument\IteratorArgument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;

final class ServiceCompilerPass extends AbstractCompilerPass
{
    protected function getListeners(): array
    {
        return [
            [RouterListener::class, 'onKernelRequest'],
        ];
    }

    protected function doAdditionalConfiguration(ContainerBuilder $builder)
    {
        $builder->register('responce_factory_value_resolver', ResponseFactoryValueResolver::class);
        $builder->register('request_value_resolver', RequestValueResolver::class);

        $resolvers = [];
        $resolvers[] = new Reference('request_value_resolver');
        $resolvers[] = new Reference('responce_factory_value_resolver');

        $builder
            ->getDefinition('argument_resolver')
            ->setArgument(0, null)
            ->setArgument(1, new IteratorArgument($resolvers));
    }
}
