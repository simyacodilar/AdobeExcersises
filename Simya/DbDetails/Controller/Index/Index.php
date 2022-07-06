<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\App\RequestInterface;

class Index implements ActionInterface
{
    /**
     * @var EmployeeInfoRepositoryInterface
     */
    protected $employeeInfoRepository;
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * Construct method
     *
     * @param EmployeeInfoRepositoryInterface $employeeInfoRepository
     * @param JsonFactory $resultJsonFactory
     * @param RequestInterface $request
     */
    public function __construct(
        EmployeeInfoRepositoryInterface $employeeInfoRepository,
        JsonFactory $resultJsonFactory,
        RequestInterface $request
    ) {
        $this->employeeInfoRepository = $employeeInfoRepository;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->request = $request;
    }

    /**
     * Execute Method
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $emp_id = $this->request->getParam('id');
        $employeedetail = $this->employeeInfoRepository->getById($emp_id);
        if (!$employeedetail->getEmpId()) {
            throw new NoSuchEntityException(__('Cant find the Employee Details with this id.'));

        } else {
            $resultJson = $this->resultJsonFactory->create();
            return $resultJson->setData([
                'Employee Id' => $employeedetail->getEmpId(),
                'name' => $employeedetail->getEmpName(),
                'Company Id' => $employeedetail->getCompanyId(),
                'Date Of Birth' => $employeedetail->getEmpDob(),
                'Address' => $employeedetail->getEmpAddress(),
                'Email' => $employeedetail->getEmpEmail(),
                'Phone' => $employeedetail->getEmpPhn(),
                'joining Date'=>$employeedetail->getEmpJoin(),
                'Salary' => $employeedetail->getEmpSalary(),
                'Insurance rate' => $employeedetail->getEmpInsurance(),
                'Is Active' => $employeedetail->getIsActive(),
                'created At' => $employeedetail->getCreted()
            ]);
        }
    }
}
