<?php

namespace TheRoom\TelegramBotBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RouteLoader extends Loader
{
    /**
     * @var bool
     */
    private $loaded = false;

    /**
     * @var
     */
    private $routePath;

    /**
     * @param $routePath
     */
    public function setRoutePath($routePath)
    {
        $this->routePath = $routePath;
    }

    /**
     * @inheritdoc
     */
    public function load($resource, $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException(
                'Do not add the "TelegramBotRouteLoader" loader twice'
            );
        }

        $routes = new RouteCollection();
        $routes
            ->add(
                'telegram_bot_route',
                $this->generateRoute()
            );

        $this->loaded = true;

        return $routes;
    }

    /**
     * @inheritdoc
     */
    public function supports($resource, $type = null)
    {
        return 'the_room_telegram_bot' === $type;
    }

    /**
     * @return Route
     */
    private function generateRoute()
    {
        return new Route(
            $this->routePath,
            $this->getDefaults(),
            $this->getRequirements()
        );
    }

    /**
     * @return array
     */
    private function getDefaults()
    {
        return [
            '_controller' => 'TheRoomTelegramBotBundle:WebHook:handleMessageUpdates',
        ];
    }

    /**
     * @return array
     */
    private function getRequirements()
    {
        return [
            'token' => '\w+'
        ];
    }
}
