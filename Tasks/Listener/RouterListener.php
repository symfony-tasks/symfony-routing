<?php

namespace BankiruSchool\Routing\Tasks\Listener;

use BankiruSchool\Routing\Common\BasicController;
use BankiruSchool\Routing\Common\DispatchedController;
use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use BankiruSchool\Routing\Common\StaticController;
use BankiruSchool\Routing\Tasks\Controller\InstanceController;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RouterListener
{
    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $path = $request->getPathInfo();

        if ($request->isMethod('GET') === true && array_key_exists($path, self::getRouteMap()) === true) {
            $route = self::getRouteMap()[$path];
            $request->attributes->add($route);
        }
    }

    /**
     * @return array
     */
    private static function getRouteMap()
    {
        return [
            '/task1/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\action'],
            '/task2/task.check' => ['_controller' => [StaticController::class, 'action']],
            '/task3/task.check' => ['_controller' => [new BasicController(ResponseFactory::create()), 'action']],
            '/task4/task.check' => ['_controller' => new InstanceController()],
            '/task5/task.check' => ['_controller' => '\BankiruSchool\Routing\Common\DispatchedController::action'],
        ];
    }
}
