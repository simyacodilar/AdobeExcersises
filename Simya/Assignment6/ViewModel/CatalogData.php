<?php

namespace Simya\Assignment6\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Directory\Model\Currency;


class CatalogData implements ArgumentInterface
{
    public function __construct(ProductInterfaceFactory $productFactory, Currency $currency)
    {
        $this->productFactory = $productFactory;
        $this->currency = $currency;
    }

    public function getProductPrice($id)
    {
        $product = $this->productFactory->create();
        $productPrice = $product->load($id)->getPrice();
        return $productPrice;
    }
    /**
     * Get currency symbol for current locale and currency code
     *
     * @return string
     */
    public function getCurrentCurrencySymbol()
    {
        return $this->currency->getCurrencySymbol();
    }

}
