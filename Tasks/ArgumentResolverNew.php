<?php

namespace BankiruSchool\Routing\Tasks;

use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

class ArgumentResolverNew
{
    public function createCombinedArgumentResolver()
    {
        $allResolvers = array_merge(ArgumentResolver::getDefaultArgumentValueResolvers(), [new ArgumentValueResolver()]);

        return new ArgumentResolver(null, $allResolvers);
    }
}
