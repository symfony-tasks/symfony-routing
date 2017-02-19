<?php

namespace BankiruSchool\Routing\Common;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\KernelEvents;

abstract class AbstractCompilerPass implements CompilerPassInterface
{
    /** {@inheritdoc} */
    final public function process(ContainerBuilder $container)
    {
        $evm = $container->getDefinition('event_dispatcher');
        foreach ($this->getListeners() as $listener) {
            $evm->addMethodCall('addListener', [KernelEvents::REQUEST, $listener]);
        }

        $this->doAdditionalConfiguration($container);
    }

    abstract protected function getListeners();

    abstract protected function doAdditionalConfiguration(ContainerBuilder $builder);
}
