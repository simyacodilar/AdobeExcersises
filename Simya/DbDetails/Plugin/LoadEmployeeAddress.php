<?php
namespace Simya\DbDetails\Plugin;

use Simya\DbDetails\Api\Data\EmployeeInfoExtension;
use Simya\DbDetails\Api\Data\EmployeeInfoExtensionFactory;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface as Subject;
use Simya\DbDetails\Api\Data\EmployeeInfoInterface;
use Simya\DbDetails\Api\EmpAddressRepositoryInterface;

class LoadEmployeeAddress
{
    /**
     * @var EmployeeInfoExtension
     */
    private EmployeeInfoExtension $employeeInfoExtension;
    /**
     * @var EmployeeInfoExtensionFactory
     */
    private EmployeeInfoExtensionFactory $employeeInfoExtensionFactory;
    /**
     * @var EmpAddressRepositoryInterface
     */
    private EmpAddressRepositoryInterface $empAddressRepositoryInterface;

    /**
     * AddressLoad constructor.
     * @param EmployeeInfoExtension $employeeInfoExtension
     * @param EmployeeInfoExtensionFactory $employeeInfoExtensionFactory
     * @param EmpAddressRepositoryInterface $empAddressRepositoryInterface
     */
    public function __construct(
        EmployeeInfoExtension $employeeInfoExtension,
        EmployeeInfoExtensionFactory $employeeInfoExtensionFactory,
        EmpAddressRepositoryInterface $empAddressRepositoryInterface
    ) {
        $this->employeeInfoExtension = $employeeInfoExtension;
        $this->employeeInfoExtensionFactory = $employeeInfoExtensionFactory;
        $this->empAddressRepositoryInterface = $empAddressRepositoryInterface;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param EmployeeInfoInterface $result
     */
    public function afterGetById(Subject $subject, $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $employeeExtension = $extensionAttributes ? $extensionAttributes : $this->employeeInfoExtensionFactory->create();
        $emp_address = $this->empAddressRepositoryInterface->getByEmployeeId($result->getEmpId());
        $employeeExtension->setEmpAddress($emp_address);
        return $result->setExtensionAttributes($employeeExtension);
    }
}
