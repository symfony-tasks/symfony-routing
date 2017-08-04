<?php

namespace BankiruSchool\Routing\Tasks\ArgumentResolver\Factory;

use BankiruSchool\Routing\Tasks\ArgumentValueResolver\ResponseFactoryValueResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

class ArgumentResolverFactory
{
    /**
     * @return ArgumentResolver
     */
    public function create()
    {
        $defaultValueResolvers = ArgumentResolver::getDefaultArgumentValueResolvers();
        $valueResolvers = array_merge($defaultValueResolvers, [new ResponseFactoryValueResolver()]);

        return new ArgumentResolver(null, $valueResolvers);
    }
}
