<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use BankiruSchool\Routing\Common\ResponseFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class ArgumentValueResolver implements  ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return ResponseFactoryInterface::class === $argument->getType();
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield ResponseFactory::create();
    }
}
