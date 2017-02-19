<?php

namespace BankiruSchool\Routing\Common;

use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

function action(Request $request): Response
{
    return ResponseFactory::create()->createResponse($request);
}
