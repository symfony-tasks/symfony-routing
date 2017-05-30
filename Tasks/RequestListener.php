<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\BasicController;
use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use BankiruSchool\Routing\Common\StaticController;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    public static function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $pathInfo = $request->getPathInfo();

        $routes = self::generateRoutes();

        if (array_key_exists($pathInfo, $routes) && $request->isMethod('GET')) {
            $request->attributes->add($routes[$pathInfo]);
        }
    }

    private static function generateRoutes(): array
    {
        return [
            '/task1/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\action' ],
            '/task2/task.check' => ['_controller' => [StaticController::class, 'action']],
            '/task3/task.check' => ['_controller' => [new BasicController(ResponseFactory::create()), 'action']],
            '/task4/task.check' => ['_controller' => new NewController()],
            '/task5/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\DispatchedController::action']
        ];
    }
}
