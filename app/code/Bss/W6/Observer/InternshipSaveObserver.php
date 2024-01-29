<?php

namespace Bss\W6\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Bss\W6\Model\InternshipFactory;

class InternshipSaveObserver implements ObserverInterface
{
    /**
     * @var \Bss\W6\Model\InternshipFactory
     */
    protected $internshipFactory;

    protected $customerRepository;
    protected $customerFactory;
    protected $customerResource;

    /**
     * @param \Bss\W6\Model\InternshipFactory $internshipFactory
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\ResourceModel\Customer $customerResource,
        InternshipFactory $internshipFactory

    )
    {
        $this->internshipFactory = $internshipFactory;
        $this->customerRepository = $customerRepository;
        $this->customerFactory = $customerFactory;
        $this->customerResource = $customerResource;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();

        // Kiểm tra xem có Internship nào có địa chỉ email giống không
        $internship = $this->getInternshipByEmail($customer->getEmail());

        if ($internship) {
            // Cập nhật thông tin của Internship bằng thông tin của khách hàng
            $internship->setFirstName($customer->getFirstname());
            $internship->setLastName($customer->getLastname());
            $internship->save();
        }
    }

    protected function getInternshipByEmail($email)
    {
        // Truy vấn cơ sở dữ liệu để lấy Internship với địa chỉ email tương ứng
        $internship = $this->internshipFactory->create()->load($email, 'email');

        return $internship->getId() ? $internship : null;
    }
}

