<?php

namespace BankiruSchool\Routing\Tasks;

use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

/**
 * Class ArgumentResolverFactory
 * @package BankiruSchool\Routing\Tasks
 */
class ArgumentResolverFactory
{
    /**
     * @return ArgumentResolver
     */
    public function createArgumentResolver()
    {
        $argumentValueResolvers = array_merge(ArgumentResolver::getDefaultArgumentValueResolvers(), [
            new TermValueResolver(),
        ]);
        $argumentResolver = new ArgumentResolver(null, $argumentValueResolvers);

        return $argumentResolver;
    }
}