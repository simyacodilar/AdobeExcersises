<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training2\CustomerRedirectPreference\Controller\Account;

use \Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Customer\Controller\Account\Index
{
    /**
     * Execute method
     *
     * @return \Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $rawResult = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $rawResult->setContents('CustomerDashboard redirects');
        return $rawResult;
    }
}
