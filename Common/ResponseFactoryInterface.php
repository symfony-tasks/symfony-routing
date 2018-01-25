<?php

namespace SymfonyTasks\Routing\Common;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ResponseFactoryInterface
{
    public function createResponse(Request $request): Response;
}
