<?php

/*
 * This file is part of the CCDNUser ProfileBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SubCCDNUser\ProfileBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 *
 * @category CCDNUser
 * @package  ProfileBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNUserProfileBundle
 *
 */
class SubCCDNUserProfileExtension extends Extension
{
    /**
     *
     * @access public
     * @return string
     */
    public function getAlias()
    {
        return 'sub_ccdn_user_profile';
    }

    /**
     *
     * @access public
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        // Configuration stuff.
        $this
			->getTagGroupsSection($config, $container)
        ;

        // Load Service definitions.
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
	
	/**
	 *
	 * @access private
	 * @param  array                                                                  $config
	 * @param  \Symfony\Component\DependencyInjection\ContainerBuilder                $container
	 * @return \SubCCDNUser\ProfileBundle\DependencyInjection\CCDNUserProfileExtension
	 */
	private function getTagGroupsSection(array $config, ContainerBuilder $container)
	{
		if (! array_key_exists('profile_biography', $config['bb_parser']['acl'])) {
			$config['bb_parser']['acl']['profile_biography'] = array(
				'enable_editor' => true,
				'enable_parser' => true,
				'tag' => array(
					'white_list' => array('*'),
					'black_list' => array()
				),
				'group' => array(
					'white_list' => array('*'),
					'black_list' => array()
				)
			);
		}
		
		if (! array_key_exists('profile_signature', $config['bb_parser']['acl'])) {
			$config['bb_parser']['acl']['profile_signature'] = array(
				'enable_editor' => true,
				'enable_parser' => true,
				'tag' => array(
					'white_list' => array('*'),
					'black_list' => array()
				),
				'group' => array(
					'white_list' => array('*'),
					'black_list' => array()
				)
			);
		}
		
		$container->setParameter('sub_ccdn_user_profile.bb_parser.acl', $config['bb_parser']['acl']);
	
		return $this;
	}
}