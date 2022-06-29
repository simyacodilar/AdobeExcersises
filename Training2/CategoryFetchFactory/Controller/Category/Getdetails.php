<?php
namespace Training2\CategoryFetchFactory\Controller\Category;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Catalog\Model\CategoryFactory;

class Getdetails extends Action
{
    protected $_categoryFactory;

    /**
     * @param Context $context
     * @param CategoryFactory $_categoryFactory
     */
    public function __construct(
        Context $context,
        CategoryFactory $_categoryFactory
    ) {
        $this->_categoryFactory = $_categoryFactory;
        return parent::__construct($context);
    }

    /**
     *Execute method
     * @return mixed
     */
    public function execute()
    {
        $categoryId=$this->getRequest()->getParam('category');
        $category=$this->_categoryFactory->create()->load($categoryId);
        $categoryName = $category->getName();
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents('category name is' .$categoryName);
        return $result;
    }
}
