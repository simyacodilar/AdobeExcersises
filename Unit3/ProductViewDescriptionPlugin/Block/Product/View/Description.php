<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\ProductViewDescriptionPlugin\Block\Product\View;

class Description extends \Magento\Catalog\Block\Product\View\Description
{
    /**
     * Before Plugin used to set custom product description
     *
     * @param \Magento\Catalog\Block\Product\View\Description $description
     */
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description)
    {
        $description->getProduct()->setDescription('Product description customized using plugins!');
    }
}
