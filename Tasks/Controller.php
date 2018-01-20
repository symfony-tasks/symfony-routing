<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        return parent::action($request);
    }
}
