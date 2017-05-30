<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class NewController extends AbstractController
{
    public function __invoke(Request $request)
    {
        return $this->action($request);
    }
}
