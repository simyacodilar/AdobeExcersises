<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

class BeforeBreadcrumbsPlugin
{
    /**
     * This before plugin functions adds a custom label
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     * @return array
     */
    public function beforeAddcrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbInfo['label'] = $crumbInfo['label'].'(!b)';
        return [$crumbName, $crumbInfo];
    }
}
