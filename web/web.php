<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BankiruSchool\Routing\MiniKernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

$kernel = new MiniKernel('dev', true);
Debug::enable();

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
