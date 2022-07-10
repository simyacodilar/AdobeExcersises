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

class Joinlist implements ActionInterface
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
    $employee= $this->employeeInfoRepository->getEmployeedetails($emp_id);
    $resultJson = $this->resultJsonFactory->create();
    return $resultJson->setData($employee);
}
}
