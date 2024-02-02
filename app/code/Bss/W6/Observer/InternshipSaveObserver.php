<?php

namespace Bss\W6\Observer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\ResourceModel\Customer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Bss\W6\Model\InternshipRepository;
use Bss\W6\Model\ResourceModel\Internship;

class InternshipSaveObserver implements ObserverInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;
    /**
     * @var CustomerFactory
     */
    protected $customerFactory;
    /**
     * @var Customer
     */
    protected $customerResource;

    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    /**
     * @var ResourceModel\Internship
     */
    protected $resource;

    /**
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerFactory $customerFactory
     * @param Customer $customerResource
     * @param InternshipRepository $internshipRepository
     * @param Internship $resource ;
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Model\CustomerFactory           $customerFactory,
        \Magento\Customer\Model\ResourceModel\Customer    $customerResource,
        InternshipRepository                              $internshipRepository,
        Internship                                        $resource
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerFactory = $customerFactory;
        $this->customerResource = $customerResource;
        $this->internshipRepository = $internshipRepository;
        $this->resource = $resource;
    }

    /**
     * Observer check email and update internship
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();

        // check email
        $internship = $this->internshipRepository->getByEmail($customer->getEmail());

        if ($internship) {
            // update internship
            $internship->setFirstName($customer->getFirstname());
            $internship->setLastName($customer->getLastname());
            $this->resource->save($internship);
        }
    }
}
