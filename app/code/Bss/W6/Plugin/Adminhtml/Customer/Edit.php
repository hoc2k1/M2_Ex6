<?php

namespace Bss\W6\Plugin\Adminhtml\Customer;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Bss\W6\Model\InternshipRepository;

class Edit
{
    /**
     * @var Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var InternshipRepository
     */

    protected $internshipRepository;


    /**
     * @param ManagerInterface $messageManager
     * @param CustomerRepositoryInterface $customerRepository
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        ManagerInterface            $messageManager,
        CustomerRepositoryInterface $customerRepository,
        InternshipRepository        $internshipRepository
    )
    {
        $this->messageManager = $messageManager;
        $this->customerRepository = $customerRepository;
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * Show noti
     *
     * @param \Magento\Customer\Controller\Adminhtml\Index\Edit $subject
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function beforeExecute(\Magento\Customer\Controller\Adminhtml\Index\Edit $subject)
    {
        $customerId = $subject->getRequest()->getParam('id');

        if ($customerId) {
            $customer = $this->customerRepository->getById($customerId);
            $email = $customer->getEmail();
            $emailExistsInInternship = $this->internshipRepository->getByEmail($email);

            if ($emailExistsInInternship) {
                $this->messageManager->addSuccessMessage(__('You got 50% off for all orders.'));
            }
        }
    }
}
