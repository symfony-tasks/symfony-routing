<?php

namespace BankiruSchool\Routing;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Kernel;


final class MiniKernel extends Kernel
{
    /** {@inheritdoc} */
    public function registerBundles()
    {
        return [];
    }

    /** {@inheritdoc} */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
    }

    public function getCacheDir()
    {
        return $this->getRootDir() . '/var/cache';
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getLogDir()
    {
        return $this->getRootDir() . '/var/logs';
    }

    protected function buildContainer()
    {
        $container = parent::buildContainer();

        $evm = $container->register('event_dispatcher', EventDispatcher::class);
        $resolver = $container->register('controller_resolver', ControllerResolver::class);
        $httpKernel = $container->register('http_kernel', HttpKernel::class);
        $httpKernel->setArguments([
            $evm,
            $resolver
        ]);

        return $container;
    }
}
