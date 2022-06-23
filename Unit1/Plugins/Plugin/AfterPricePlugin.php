<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

class AfterPricePlugin
{
    /**
     * Function adds some fixed amount with product's price
     *
     * @param \Magento\Catalog\Model\Product $subject
     * @param bool|float $result
     * @return mixed
     */
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 0.5;
    }
}
