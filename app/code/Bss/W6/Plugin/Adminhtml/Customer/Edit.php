<?php
// app/code/Vendor/Module/Plugin/Adminhtml/Customer/Edit.php
namespace Bss\W6\Plugin\Adminhtml\Customer;

use Bss\W6\Model\InternshipFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Message\ManagerInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;

class Edit
{
    /**
     * @var \Bss\W6\Model\InternshipFactory
     */
    protected $internshipFactory;

    /**
     * @var Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;


    /**
     * @param InternshipFactory $internshipFactory
     * @param ManagerInterface $messageManager
     * @param CustomerRepositoryInterface $customerRepository
     * @param Context $context
     */
    public function __construct(
        InternshipFactory $internshipFactory,
        ManagerInterface $messageManager,
        CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->internshipFactory = $internshipFactory;
        $this->messageManager = $messageManager;
        $this->customerRepository = $customerRepository;
    }
    public function aroundExecute(
        \Magento\Customer\Controller\Adminhtml\Index\Edit $subject,
        \Closure                                          $proceed
    )
    {
        // Assuming you have the customer ID, replace with the actual customer ID
        $customerId = $subject->getRequest()->getParam('id');
        if($customerId) {
            // Load the customer by ID
            $customer = $this->customerRepository->getById($customerId);

            // Get the email address

            $email = $customer->getEmail();

            // Add your logic to check if the customer email exists in datainternship
            $emailExistsInInternship = $this->checkEmailInInternship($email);
            if ($emailExistsInInternship) {
                // Display the message
                $this->messageManager->addSuccess(__('You got 50% off for all orders.'));
            }
        }
        // Proceed with the original method
        $result = $proceed();

        return $result;
    }

    // Truy vấn cơ sở dữ liệu để lấy Internship với địa chỉ email tương ứng
    protected function checkEmailInInternship($email)
    {
        $internship = $this->internshipFactory->create()->load($email, 'email');
        return $internship->getId() ? $internship : null;
    }
}
