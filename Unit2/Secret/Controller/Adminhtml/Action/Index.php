<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\Secret\Controller\Adminhtml\Action;

class Index extends \Magento\Backend\App\Action
{
    /**
     * Execute method
     */
    public function execute()
    {
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents('Hello World!');
        return $result;
    }

    /**
     * Function allowed route only if certain param exist in url
     *
     * @return int
     */
    protected function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int)$secret==1;
    }

    /**
     * Link must be generated by server side
     *
     * It's only for education purpose!
     *
     * @return bool
     */
    public function _processUrlKeys()
    {
        return true;
    }
}
