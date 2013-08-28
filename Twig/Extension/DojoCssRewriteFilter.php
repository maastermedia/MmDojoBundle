<?php

namespace Dojo\DojoBundle\Twig\Extension;

use Assetic\Filter\CssRewriteFilter;
use Assetic\Asset\AssetInterface;

class DojoCssRewriteFilter extends CssRewriteFilter {
	protected $values;
	
	public function filterLoad(AssetInterface $asset)
    {
		parent::filterLoad($asset);
		$this->values = $asset->getValues();
    }
	
	public function filterDump(AssetInterface $asset)
    {
		parent::filterDump($asset);
		$content = $asset->getContent();
		foreach($this->values as $var => $value) {
			$content = str_replace('{' . $var . '}', $value, $content);
		}
		$asset->setContent($content);
    }
}

?>
