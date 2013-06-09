<?php

/*
 * This file is part of the CCDNForum AdminBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SubCCDNForum\AdminBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 *
 * @category CCDNForum
 * @package  AdminBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNForumAdminBundle
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     *
     * @access public
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sub_ccdn_forum_admin');

        // Configuration stuff.
        $this
			->addTagGroups($rootNode)
        ;

        return $treeBuilder;
    }
	
    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                        $node
     * @return \SubCCDNForum\AdminBundle\DependencyInjection\Configuration
     */
    private function addTagGroups(ArrayNodeDefinition $node)
    {
		$node
			->addDefaultsIfNotSet()
			->canBeUnset()
			->children()
				->arrayNode('bb_parser')
					->addDefaultsIfNotSet()
					->canBeUnset()
					->children()
						->arrayNode('acl')
							->prototype('array') // For the tag groups
								->children()
									->booleanNode('enable_parser')->defaultTrue()->end()
									->booleanNode('enable_editor')->defaultTrue()->end()
									->arrayNode('group') // for the group list
										->addDefaultsIfNotSet()
										->canBeUnset()
										->children()
											->arrayNode('white_list')
												->prototype('scalar')->end()
											->end()
											->arrayNode('black_list')
												->prototype('scalar')->end()
											->end()
										->end()
									->end()
									->arrayNode('tag')
										->addDefaultsIfNotSet()
										->canBeUnset()
										->children()
											->arrayNode('white_list')
												->prototype('scalar')->end()
											->end()
											->arrayNode('black_list')
												->prototype('scalar')->end()
											->end()
										->end()
									->end()
								->end()
							->end()
						->end()
					->end()
				->end()
			->end()
		;
		
		return $this;
	}
}