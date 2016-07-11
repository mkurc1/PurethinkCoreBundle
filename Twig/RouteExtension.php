<?php

namespace Purethink\CoreBundle\Twig;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RequestStack;

class RouteExtension extends \Twig_Extension
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var RequestStack
     */
    private $requestStack;

    public function __construct(RequestStack $requestStack, Router $router)
    {
        $this->requestStack = $requestStack;
        $this->router = $router;
    }

    public function getTests()
    {
        return [
            new \Twig_SimpleTest('same_route', [$this, 'isTheSameRouteName']),
        ];
    }

    public function isTheSameRouteName($path)
    {
        $attributes = $this->requestStack->getCurrentRequest()->attributes;
        $route = $attributes->get('_route');
        $params = $attributes->get('_route_params');

        return $this->router->generate($route, $params) == $path;
    }


    public function getName()
    {
        return 'purethink_route_extension';
    }
}