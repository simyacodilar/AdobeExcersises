<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\CatalogProductPreference\Controller\Product;

use \Magento\Framework\Controller\ResultFactory;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * Execute method
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $rawResult = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $rawResult->setContents('Hello world');
        return $rawResult;
    }
}
