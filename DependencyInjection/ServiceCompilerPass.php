<?php

namespace BankiruSchool\Routing\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\KernelEvents;

final class ServiceCompilerPass implements CompilerPassInterface
{
    /** {@inheritdoc} */
    public function process(ContainerBuilder $container)
    {
        $evm = $container->getDefinition('event_dispatcher');
        foreach ($this->getListeners() as $listener) {
            $evm->addMethodCall('addListener', [KernelEvents::REQUEST, $listener]);
        }
    }

    private function getListeners(): array
    {
        return [];
    }
}
