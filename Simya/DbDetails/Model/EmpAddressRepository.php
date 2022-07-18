<?php
namespace Simya\DbDetails\Model;

use Simya\DbDetails\Api\EmpAddressRepositoryInterface;
use Simya\DbDetails\Api\Data\EmpAddressInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Simya\DbDetails\Api\Data\AddressSearchResultsInterfaceFactory;
use Simya\DbDetails\Model\ResourceModel\EmpAddress\CollectionFactory;
use Simya\DbDetails\Model\EmpAddressFactory;
use Simya\DbDetails\Model\ResourceModel\EmpAddress as ResourceModel;

class EmpAddressRepository implements EmpAddressRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;
    /**
     * @var EmpAddressFactory
     */
    private EmpAddressFactory $addressFactory;
    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;
    /**
     * @var AddressSearchResultsInterfaceFactory
     */
    protected AddressSearchResultsInterfaceFactory $addressSearchResultsInterfaceFactory;

    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    /**
     * @var CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;

    /**
     * @param CollectionFactory $collectionFactory
     * @param \Simya\DbDetails\Model\EmpAddressFactory $addressFactory
     * @param ResourceModel $resourceModel
     * @param AddressSearchResultsInterfaceFactory $addressSearchResultsInterfaceFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        EmpAddressFactory $addressFactory,
        ResourceModel $resourceModel,
        AddressSearchResultsInterfaceFactory $addressSearchResultsInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder

    ) {
        $this->collectionFactory = $collectionFactory;
        $this->EmpAddressFactory = $addressFactory;
        $this->resourceModel = $resourceModel;
        $this->addressSearchResultsInterfaceFactory = $addressSearchResultsInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

    }

    /**
     * Get address by id
     *
     * @param string $id
     * @return EmpAddressInterface
     */
    public function getById($id)
    {
        $address = $this->EmpAddressFactory->create();
        $this->resourceModel->load($address, $id);
        return $address;
    }
    /**
     * @inheritDoc
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult = $this->addressSearchResultsInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * Get Address using employee Id
     *
     * @param $empId
     * @return EmpAddressInterface[]|null
     */
    public function getAddressByEmployee($empId)
    {
        $filter = $this->filterBuilder->setField('emp_id')
            ->setConditionType('eq')
            ->setValue($empId)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        return $this->getList($searchCriteria)->getItems();
    }


}
