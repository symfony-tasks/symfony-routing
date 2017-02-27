<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\BasicController;
use BankiruSchool\Routing\Common\DispatchedController;
use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use BankiruSchool\Routing\Common\StaticController;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $pathInfo = $request->getPathInfo();

        if ($request->isMethod('get') && array_key_exists($pathInfo, self::getRoutes())) {
            $request->attributes->add(self::getRoutes()[$pathInfo]);
        }
    }

    /**
     * @return array
     */
    public static function getRoutes()
    {
        return [
            '/task1/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\action'],
            '/task2/task.check' => ['_controller' => [StaticController::class, 'action']],
            '/task3/task.check' => ['_controller' => [new BasicController(ResponseFactory::create()), 'action']],
            '/task4/task.check' => ['_controller' => new SomeController()],
            '/task5/task.check' => ['_controller' => DispatchedController::class . '::action'],
        ];
    }
}