<?php

namespace Simya\DbDetails\Block;

use Magento\Framework\View\Element\Template;
use Simya\DbDetaILS\Api\Data\EmployeeSearchResultsInterface;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class View extends Template
{
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    private EmployeeInfoRepositoryInterface $employeeInfoRepository;


    public function __construct(
        Template\Context $context,
        EmployeeInfoRepositoryInterface $employeeInfoRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->employeeInfoRepository = $employeeInfoRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }


    public function getEmployees()
    {
        return $this->employeeInfoRepository->getList($this->searchCriteriaBuilder->create())->getItems();
    }

    /**
     * Get Action Url
     *
     * @return string
     */
    public function getActionUrl()
    {
        return $this->getUrl('simyadbfetch/index/save');
    }

    /**
     * Get form url
     *
     * @return string
     */
    public function getAddUrl()
    {
        return $this->getUrl('simyadbfetch/index/add');
    }

    /**
     * Get Employee
     *
     * @return \Simya\DbDetails\Api\Data\EmployeeInfoInterface|null
     */
    public function getEmployee()
    {
        $id = $this->getRequest()->getParam('id');
        return $this->employeeInfoRepository->getById($id);
    }

    /**
     * Get delete url
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('simyadbfetch/index/delete');
    }
}

