<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use BankiruSchool\Routing\Common\ResponseFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class ResponseFactoryResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return $argument->getType() === ResponseFactoryInterface::class;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): ?\Generator
    {
        yield ResponseFactory::create();
    }
}
