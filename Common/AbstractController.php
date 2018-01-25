<?php

namespace SymfonyTasks\Routing\Common;

use SymfonyTasks\Routing\Common\Factory\ResponseFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    final protected function action(Request $request): Response
    {
        return ResponseFactory::create()->createResponse($request);
    }
}
