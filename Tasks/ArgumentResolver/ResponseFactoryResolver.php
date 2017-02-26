<?php

namespace BankiruSchool\Routing\Tasks\ArgumentResolver;

use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use BankiruSchool\Routing\Common\ResponseFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use BankiruSchool\Routing\Common\Factory\ResponseFactory;

/**
 * ResponseFactoryResolver
 */
class ResponseFactoryResolver implements ArgumentValueResolverInterface
{
    /**
     * @param \BankiruSchool\Routing\Tasks\ArgumentResolver\Request $request
     * @param \BankiruSchool\Routing\Tasks\ArgumentResolver\ArgumentMetadata $argument
     */
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        if (ResponseFactoryInterface::class === $argument->getType()) {
            return true;
        }

        return false;
    }
    
    /**
     * @param \BankiruSchool\Routing\Tasks\ArgumentResolver\Request $request
     * @param \BankiruSchool\Routing\Tasks\ArgumentResolver\ArgumentMetadata $argument
     */
    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield ResponseFactory::create();
    }
}
