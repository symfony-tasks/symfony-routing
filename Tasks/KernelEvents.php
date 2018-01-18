<?php

namespace BankiruSchool\Routing\Tasks;

use BankiruSchool\Routing\Common\BasicController;
use BankiruSchool\Routing\Common\Factory\ResponseFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class KernelEvents
{
    public static function request(GetResponseEvent $event): void
    {
        $route = self::resolveRoute($event->getRequest());

        if (null !== $route) {
            foreach ($route as $parameter => $value) {
                $event->getRequest()->attributes->set($parameter, $value);
            }
        }
    }

    private static function resolveRoute(Request $request): ?array
    {
        $routing = [
            'task1' => [
                'path' => '/task1/task.check',
                'controller' => 'BankiruSchool\Routing\Common\action',
                'method' => 'GET',
            ],
            'task2' => [
                'path' => '/task2/task.check',
                'controller' => 'BankiruSchool\Routing\Common\StaticController::action',
                'method' => 'GET',
            ],
            'task3' => [
                'path' => '/task3/task.check',
                'controller' => [new BasicController(ResponseFactory::create()), 'action'],
                'method' => 'GET',
            ],
            'task4' => [
                'path' => '/task4/task.check',
                'controller' => new Controller(),
                'method' => 'GET',
            ],
        ];

        foreach ($routing as $name => $route) {
            if ($route['path'] === $request->getPathInfo() && $route['method'] === $request->getMethod()) {
                return [
                    '_route' => $name,
                    '_controller' => $route['controller']
                ];
            }
        }
        return null;
    }
}
