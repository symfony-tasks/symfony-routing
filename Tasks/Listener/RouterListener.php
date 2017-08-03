<?php

namespace BankiruSchool\Routing\Tasks\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RouterListener
{
    private static $routeMap = [
        '/task1/task.check' => ['_controller' => 'BankiruSchool\Routing\Common\action'],
    ];

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $route = self::getRoute($request->getPathInfo());

        if ($request->isMethod('GET') && $route !== false) {
            $request->attributes->add($route);
        }
    }

    private static function getRoute(string $path)
    {
        if (array_key_exists($path, self::$routeMap) === false) {
            return false;
        }

        return self::$routeMap[$path];
    }

}
