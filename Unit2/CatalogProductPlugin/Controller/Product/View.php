<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\CatalogProductPlugin\Controller\Product;

class View extends \Magento\Framework\App\Action\Action
{

    /**
     * Execute Method
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create('raw')->setContents(' echo plugin ');
    }

    /**
     * After Plugin method
     *
     * @param \Magento\Catalog\Controller\Product\View $controller
     * @param mixed $result
     * @return mixed
     */
    public function afterExecute(\Magento\Catalog\Controller\Product\View $controller, $result)
    {
        return $result;
    }
}
