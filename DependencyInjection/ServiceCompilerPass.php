<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use BankiruSchool\Routing\Tasks\Listener\RouterListener;
use Symfony\Component\DependencyInjection\ContainerBuilder;

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
    }
}
