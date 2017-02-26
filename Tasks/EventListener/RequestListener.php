<?php

namespace BankiruSchool\Routing\Tasks\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use BankiruSchool\Routing\Common\StaticController;
use BankiruSchool\Routing\Common\BasicController;
use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use BankiruSchool\Routing\Tasks\Controller\ObjectController;

/**
 * RequestListener
 */
class RequestListener
{
    /**
     * @param GetResponseEvent $event
     */
    public static function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $path = $request->getPathInfo();

        $routes = self::getRoutes();

        if ($request->isMethod('GET') && array_key_exists($path, $routes)) {
            $request->attributes->add($routes[$path]);
        }
    }

    /**
     * @return array
     */
    private static function getRoutes(): array
    {
        $responseFactory = ResponseFactory::create();

        return [
            '/task1/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\action'],
            '/task2/task.check' => ['_controller' => [StaticController::class, 'action']],
            '/task3/task.check' => ['_controller' => [new BasicController($responseFactory), 'action']],
            '/task4/task.check' => ['_controller' => new ObjectController()],
            '/task5/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\DispatchedController::action'],
        ];
    }
}
