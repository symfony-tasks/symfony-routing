<?php

namespace BankiruSchool\Routing\Tasks\Factory;

use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use BankiruSchool\Routing\Tasks\ArgumentResolver\ResponseFactoryResolver;

/**
 * ArgumentResolverFactory
 */
class ArgumentResolverFactory
{
    /**
     * @return ArgumentResolver
     */
    public static function createArgumentResolver()
    {
        $valueResolvers = array_merge(ArgumentResolver::getDefaultArgumentValueResolvers(), [
            new ResponseFactoryResolver(),
        ]);

        return new ArgumentResolver(null, $valueResolvers);
    }
}
