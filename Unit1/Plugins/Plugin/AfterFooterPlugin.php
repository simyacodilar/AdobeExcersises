<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

class AfterFooterPlugin
{
    /**
     * Function used to return custom copyright text
     *
     * @param \Magento\Theme\Block\Html\Footer $subject
     * @param string $result
     * @return string
     */
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return 'Customized copyright!';
    }
}
