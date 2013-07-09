<?php

/*
 * This file is part of the DojoBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dojo\DojoBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/*
 * Twig Extension for Dojo
 */
class DojoExtension extends \Twig_Extension
{
    /*
     * Container
     *
     * @var ContainerInterface
     */
    protected $container, $config;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
		// If request scope is not active, e.g. on the console, then set one
		if (!$this->getContainer()->isScopeActive('request')) {
			$this->getContainer()->enterScope('request');
			$this->getContainer()->set('request', new \Symfony\Component\HttpFoundation\Request(), 'request');
		}
		// Getting the path through the asset interface
		$this->config = $this->container->getParameter('dojo_config');
		if (isset($this->config['packages']) && !empty($this->config['packages'])) {
			$helper = $this->container->get('templating.helper.assets');
			foreach($this->config['packages'] as $i => $package) {
				$this->config['packages'][$i]['location'] 
					= $helper->getUrl($package['location'], null);
			}
		} 
		if (isset($this->config['baseUrl'])) {
			// Unsetting baseUrl if empty
			if (empty($this->config['baseUrl'])) {
				unset($this->config['baseUrl']);
			} else {
				// Getting path through the asset interface
				$helper = $this->container->get('templating.helper.assets');
				$this->config['baseUrl'] = $helper->getUrl($this->config['baseUrl'], null);
				
			}
		}
    }

    /*
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
    
    public function getGlobals()
    {
        $globals = array(
            'dojo_theme' => $this->getContainer()->getParameter('dojo_theme'),
        );
		if (isset($this->config['baseUrl'])) {
			$globals['dojo_baseUrl'] = $this->config['baseUrl'];
		}
		return $globals;
    }
    
    public function getFunctions()
    {
        return array(
            'dojo_config' => new \Twig_Function_Method($this, 'renderDojoConfig', array('is_safe' => array('html'))),
        );
    }
    
    /*
     * Renders Dojo configuration
     */
    public function renderDojoConfig()
    {
        return ($this->getContainer()->get('templating')->render('DojoDojoBundle::config.html.twig', array(
            'dojo_config' => $this->config
        )));
    }
    
    public function getName()
    {
        return 'dojo';
    }
}
