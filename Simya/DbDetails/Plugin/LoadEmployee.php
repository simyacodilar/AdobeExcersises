<?php
namespace Simya\DbDetails\Plugin;

use Simya\DbDetails\Api\Data\EmpAddressExtension;
use Simya\DbDetails\Api\Data\EmpAddressExtensionFactory;
use Simya\DbDetails\Api\EmpAddressRepositoryInterface as Subject;
use Simya\DbDetails\Api\Data\EmpAddressInterface;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;

class LoadEmployee
{
    /**
     * @var EmpAddressExtension
     */
    private EmpAddressExtension $empAddressExtension;
    /**
     * @var EmpAddressExtensionFactory
     */
    private EmpAddressExtensionFactory $empAddressExtensionFactory;
    /**
     * @var EmployeeInfoRepositoryInterface
     */
    private EmployeeInfoRepositoryInterface $employeeInfoRepositoryInterface;

    /**
     * AddressLoad constructor.
     * @param EmpAddressExtension $empAddressExtension
     * @param EmpAddressExtensionFactory $empAddressExtensionFactory
     * @param EmployeeInfoRepositoryInterface $employeeInfoRepositoryInterface
     */
    public function __construct(
        EmpAddressExtension $empAddressExtension,
        EmpAddressExtensionFactory $empAddressExtensionFactory,
        EmployeeInfoRepositoryInterface $employeeInfoRepositoryInterface
    ) {
        $this->empAddressExtension = $empAddressExtension;
        $this->empAddressExtensionFactory = $empAddressExtensionFactory;
        $this->employeeInfoRepositoryInterface = $employeeInfoRepositoryInterface;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param EmpAddressInterface $result
     */
    public function afterGetById(Subject $subject, $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $addressExtension = $extensionAttributes ? $extensionAttributes : $this->employeeInfoExtensionFactory->create();
        $emp_dtls = $this->employeeInfoRepositoryInterface->getById($result->getEmpId());
        $addressExtension->setEmployee($emp_dtls);
        return $result->setExtensionAttributes($addressExtension);
    }
}
