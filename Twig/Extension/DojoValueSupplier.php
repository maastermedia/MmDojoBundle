<?php

namespace Dojo\DojoBundle\Twig\Extension;

use Symfony\Bundle\AsseticBundle\DefaultValueSupplier;

/**
 * This class provides Assetic with the value of 'dojo_theme'
 *
 * @author Jochen Schäfer <josch1710@live.de>
 */
class DojoValueSupplier extends DefaultValueSupplier {
	public function getValues() { 
		$result = parent::getValues(); 
        if (!$this->container->isScopeActive('request')) {
            return $result;
        }
		$result['dojo_theme'] = $this->container->getParameter('dojo_theme');
		return $result;
	}
}

?>
