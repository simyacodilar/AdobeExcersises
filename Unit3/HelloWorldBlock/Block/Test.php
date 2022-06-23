<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\HelloWorldBlock\Block;

class Test extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * The function used to return string
     * @return string
     */
    protected function _toHtml()
    {
        return "<b>Hello world from the block!!!</b>";
    }
}
