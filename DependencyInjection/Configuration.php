<?php

namespace TheRoom\TelegramBotBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('the_room_telegram_bot');
        $rootNode
            ->children()
                ->scalarNode('routePath')
                    ->defaultValue('/bot/{token}/handle-messages-updates')
                ->end()
                ->arrayNode('bots')
                    ->requiresAtLeastOneElement()
                        ->prototype('array')
                            ->children()
                                ->scalarNode('token')->end()
                            ->end()
                        ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
