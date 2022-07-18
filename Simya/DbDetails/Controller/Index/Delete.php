<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Simya\DbDetails\Controller\Index;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;

class Delete implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;
    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;
    /**
     * @var EmployeeInfoRepositoryInterface
     */
    private EmployeeInfoRepositoryInterface $employeeInfoRepository;

    /**
     * Delete constructor.
     *
     * @param RequestInterface $request
     * @param RedirectFactory $redirectFactory
     * @param ManagerInterface $messageManager
     * @param EmployeeInfoRepositoryInterface $employeeInfoRepository
     */
    public function __construct(
        RequestInterface $request,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager,
        EmployeeInfoRepositoryInterface $employeeInfoRepository
    ) {
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->employeeInfoRepository = $employeeInfoRepository;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $employeeId = $this->request->getParam('id');
        $this->employeeInfoRepository->deleteById($employeeId);
        $this->messageManager->addSuccessMessage("Employee deleted successfully");
        return $this->redirectFactory->create()->setPath('simyadbfetch/index/display');
    }
}
