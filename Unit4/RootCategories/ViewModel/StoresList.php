<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Unit4\RootCategories\ViewModel;

use \Magento\Framework\View\Element\Block\ArgumentInterface;
use \Magento\Catalog\Model\CategoryFactory;
use \Magento\Store\Model\StoreManager;

class StoresList implements ArgumentInterface
{
    /**
     * Constructor method
     *
     * @param CategoryFactory $categoryFactory
     * @param StoreManager $storeManager
     */
    public function __construct(
        CategoryFactory $categoryFactory,
        StoreManager $storeManager
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->storeManager    = $storeManager;
    }

    /**
     * Function to return root categories and store views
     *
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getRootCategories()
    {
        $storesList = $this->storeManager->getStores();
        $catalogCategory = $this->categoryFactory->create();

        $stores = [];
        foreach ($storesList as $store) {
            $categoryName = $catalogCategory->load($store->getRootCategoryId())->getName();
            $stores[] = [
                'store_name' => $store->getName(),
                'root_category_name' => $categoryName
            ];
        }

        $stores = array_map(function ($item) {
            $string = '<b>STORE</b> ' . $item['store_name'] . '<br>';
            $string .= ' <b>ROOT CATEGORY</b> ' . $item['root_category_name'] . '<br> <br>';

            return $string;
        }, $stores);

        $response = implode('', $stores);
        return $response;
    }
}
