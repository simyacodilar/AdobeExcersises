<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Simya\DbDetails\Api\Data\EmployeeInfoInterface;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;
use Simya\DbDetails\Api\Data\EmployeeSearchResultsInterface;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo as ResourceModel;
use Simya\DbDetails\Model\EmployeeInfoFactory as EmployeeInfoFactory;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo\CollectionFactory;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo\Collection;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Simya\DbDetails\Api\Data\EmployeeSearchResultsInterfaceFactory;


class EmployeeInfoRepository implements EmployeeInfoRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    private ResourceModel $resouceModel;
    /**
     * @var EmployeeInfoFactory
     */
    private EmployeeInfoFactory $employeeInfoFactory;
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionfactory;

    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;
    /**
     * @var EmployeeSearchResultsInterfaceFactory
     */
    private EmployeeSearchResultsInterfaceFactory $employeeSearchResultsInterfaceFactory;
    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * SachinEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param EmployeeInfoFactory $employeeInfoFactory
     * @param CollectionFactory $collectionfactory
     * @param ResourceConnection $resourceConnection
     * @param CollectionProcessorInterface $collectionProcessor
     * @param Collection $collection
     * @param EmployeeSearchResultsInterfaceFactory $employeeSearchResultsInterfaceFactory
     */
    public function __construct(
        ResourceModel $resourceModel,
        EmployeeInfoFactory $employeeInfoFactory,
        CollectionFactory $collectionfactory,
        ResourceConnection $resourceConnection,
        CollectionProcessorInterface $collectionProcessor,
        Collection $collection,
        EmployeeSearchResultsInterfaceFactory $employeeSearchResultsInterfaceFactory
    ) {
        $this->resouceModel = $resourceModel;
        $this->employeeInfoFactory = $employeeInfoFactory;
        $this->collectionfactory = $collectionfactory;
        $this->resourceConnection = $resourceConnection;
        $this->collectionProcessor = $collectionProcessor;
        $this->employeeSearchResultsInterfaceFactory = $employeeSearchResultsInterfaceFactory;
        $this->collection = $collection;
    }


    /**
     * @inheritDoc
     */
    public function getById(string $empId)
    {
        $employeeModel = $this->employeeInfoFactory->create();
        $this->resourceModel->load($employeeModel, $empId);
        return $employeeModel;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($empId)
    {
        $employee = $this->employeeInfoFactory->create();
        $this->resouceModel->load($employee, $empId);
        return $this->resouceModel->delete($employee);
    }

    /**
     * @inheritDoc
     */
    public function save(EmployeeInfoInterface $employee)
    {
        try {
            $this->resouceModel->save($employee);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionfactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->employeeSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }
}
