<?php

namespace BankiruSchool\Routing;

use BankiruSchool\Routing\DependencyInjection\ServiceCompilerPass;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
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

        $container->register('event_dispatcher', EventDispatcher::class);
        $container->register('controller_resolver', ControllerResolver::class);
        $container->register('request_stack', RequestStack::class);
        $container->register('argument_resolver', ArgumentResolver::class);

        $container
            ->register('http_kernel', HttpKernel::class)
            ->setArguments([
                new Reference('event_dispatcher'),
                new Reference('controller_resolver'),
                new Reference('request_stack'),
                new Reference('argument_resolver'),
            ]);

        $container->addCompilerPass(new ServiceCompilerPass());

        return $container;
    }
}
