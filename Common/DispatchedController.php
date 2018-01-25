<?php

namespace SymfonyTasks\Routing\Common;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class DispatchedController
{
    public function action(Request $request, ResponseFactoryInterface $factory): Response
    {
        return $factory->createResponse($request);
    }
}
