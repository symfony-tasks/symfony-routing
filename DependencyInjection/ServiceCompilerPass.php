<?php

namespace SymfonyTasks\Routing\DependencyInjection;

use SymfonyTasks\Routing\Common\AbstractCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ServiceCompilerPass extends AbstractCompilerPass
{
    protected function getListeners(): array
    {
        return [];
    }

    protected function doAdditionalConfiguration(ContainerBuilder $builder)
    {
    }
}
