<?php

namespace BankiruSchool\Routing\Tasks\Controller;

use BankiruSchool\Routing\Common\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * ObjectController
 */
class ObjectController extends AbstractController
{
    /**
     * @param Request $request
     * @return type
     */
    public function __invoke(Request $request): Response
    {
        return $this->action($request);
    }
}
