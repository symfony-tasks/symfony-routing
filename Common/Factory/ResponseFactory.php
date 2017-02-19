<?php

namespace BankiruSchool\Routing\Common\Factory;

use BankiruSchool\Routing\Common\ResponseFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ResponseFactory implements ResponseFactoryInterface
{
    /** {@inheritdoc} */
    public function createResponse(Request $request): Response
    {
        return new Response($request->get('term'));
    }

    public static function create()
    {
        return new static();
    }
}
