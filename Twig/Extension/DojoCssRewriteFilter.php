<?php

namespace Dojo\DojoBundle\Twig\Extension;

use Assetic\Asset\FileAsset;
use Assetic\Filter\CssRewriteFilter;
use Assetic\Asset\AssetInterface;
use Assetic\Util\VarUtils;

class DojoCssRewriteFilter extends CssRewriteFilter {
	public function filterDump(AssetInterface $asset)
    {
		parent::filterDump($asset);
		$asset->setContent(
            VarUtils::resolve($asset->getContent(), $asset->getVars(), $asset->getValues())
        );
    }
}

?>
