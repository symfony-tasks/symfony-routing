<?php

namespace BankiruSchool\Routing\DependencyInjection;

use BankiruSchool\Routing\Common\AbstractCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use BankiruSchool\Routing\Tasks\EventListener\RequestListener;

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
    }
}
