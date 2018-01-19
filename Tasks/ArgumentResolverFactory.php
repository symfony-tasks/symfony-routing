<?php

namespace BankiruSchool\Routing\Tasks;

use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

class ArgumentResolverFactory
{
    public function instance(): ArgumentResolver
    {
        return new ArgumentResolver(
            null,
            array_merge(
                ArgumentResolver::getDefaultArgumentValueResolvers(),
                [new ResponseFactoryResolver()]
            )
        );
    }
}
