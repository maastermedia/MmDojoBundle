<?php

/*
 * This file is part of the DojoBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dojo\DojoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dojo_dojo');
        
        $rootNode
            ->children()
                ->scalarNode('theme')->defaultValue('claro')->end()
                ->arrayNode('dojo_config')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('async')->defaultTrue()->end()
                        ->booleanNode('parseOnLoad')->defaultTrue()->end()
                        ->booleanNode('isDebug')->defaultFalse()->end()
						->booleanNode('cacheBust')->defaultFalse()->end()
						->scalarNode('baseUrl')->defaultValue('')->end()
						->scalarNode('locale')->defaultValue('en-gb')->end()
						->arrayNode('packages')->prototype('array')->children()
							->scalarNode('name')->isRequired()->end()
							->scalarNode('location')->isRequired()->end()
						->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
