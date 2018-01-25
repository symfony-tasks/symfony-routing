<?php

namespace SymfonyTasks\Routing\Common;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BasicController
{
    /** @var ResponseFactoryInterface */
    private $factory;

    /**
     * BasicController constructor.
     * @param ResponseFactoryInterface $factory
     */
    public function __construct(ResponseFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function action(Request $request): Response
    {
        return $this->factory->createResponse($request);
    }
}
