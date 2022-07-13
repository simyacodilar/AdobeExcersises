<?php
namespace Simya\DbDetails\Model;

use Simya\DbDetails\Api\EmpAddressRepositoryInterface;
use Simya\DbDetails\Api\Data\EmpAddressInterface;
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
     * AddressRepository constructor.
     * @param CollectionFactory $collectionFactory
     * @param EmpAddressFactory $addressFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        EmpAddressFactory $addressFactory,
        ResourceModel $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->EmpAddressFactory = $addressFactory;
        $this->resourceModel = $resourceModel;;
    }

    /**
     * Get address by empId
     *
     * @param string $empId
     * @return EmpAddressInterface[]|null
     */
    public function getByEmployeeId($empId)
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('emp_id', ['eq' => $empId]);
        return $collection->getData();
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
}
