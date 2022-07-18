<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Simya\DbDetails\Controller\Index;

use Simya\DbDetails\Api\Data\EmployeeInfoInterface;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Simya\DbDetails\Api\Data\EmployeeInfoInterfaceFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

class Save implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var EmployeeInfoRepositoryInterface
     */
    private EmployeeInfoRepositoryInterface $employeeInfoRepository;
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;
    /**
     * @var EmployeeInfoInterfaceFactory
     */
    private EmployeeInfoInterfaceFactory $employeeInfoInterfaceFactory;
    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;

    /**
     * @param EmployeeInfoRepositoryInterface $employeeInfoRepository
     * @param RequestInterface $request
     * @param EmployeeInfoInterfaceFactory $employeeinfoFactory
     * @param RedirectFactory $redirectFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        EmployeeInfoRepositoryInterface $employeeInfoRepository,
        RequestInterface $request,
        EmployeeInfoInterfaceFactory $employeeinfoFactory,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager
    ) {
        $this->employeeInfoRepository = $employeeInfoRepository;
        $this->request = $request;
        $this->employeeinfoFactory = $employeeinfoFactory;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        $employee = '';
        if (!empty($id)) {
            $employee = $this->employeeInfoRepository->getById($id);
        } else {
            $employee = $this->employeeinfoFactory->create();
        }
        $result = $this->saveEmployee($employee, $this->request->getParams());
        $redirect = $this->redirectFactory->create();
        if ($result) {
            $this->messageManager->addSuccessMessage("Employee save successfully");
            return $redirect->setPath('simyadbfetch/index/view');
        } else {
            $this->messageManager->addErrorMessage("Failed to save employee");
            return $redirect->setPath('simyadbfetch/index/view');
        }
    }

    /**
     * Save Employee
     *
     * @param EmployeeInfoInterface $employee
     * @param array $params
     */
    public function saveEmployee($employee, $params)
    {
        $employee->setEmpName($params['name']);
        $employee->setEmpAddress($params['address']);
        $employee->setEmpDob($params['dob']);
        $employee->setEmpEmail($params['email']);
        $employee->setEmpPhn($params['phone']);
        $employee->setEmpJoin($params['join']);
        $employee->setEmpSalary($params['salary']);
        $employee->setEmpInsurance($params['insurance']);
        $employee->setIsActive($params['is_active']);

        return $this->employeeInfoRepository->save($employee);
    }
}
