<?php
namespace Bss\W6\Controller\Adminhtml\Internship;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Bss\W6\Model\InternshipFactory
     */
    protected $internshipFactory;

    /**
     * @var \Magento\Framework\Event\ManagerInterface
     */
    protected $eventManager;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Bss\W6\Model\InternshipFactory $internshipFactory
     * @param \Magento\Framework\Event\ManagerInterface $eventManager
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Bss\W6\Model\InternshipFactory $internshipFactory,
        \Magento\Framework\Event\ManagerInterface $eventManager
    ) {
        parent::__construct($context);
        $this->internshipFactory = $internshipFactory;
        $this->eventManager = $eventManager;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('week6/internship/addrow');
            return;
        }
        try {
            $rowData = $this->internshipFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }

            // Dispatch a custom event after saving the Internship record
//            $this->eventManager->dispatch('internship_save', ['internship' => $rowData]);
            $rowData->afterSave();
            $this->messageManager->addSuccessMessage(__('Your data has been saved!'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("There was an error while saving Internship data, please try again!"));
        }
        $this->_redirect('week6/internship/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bss_W6::save');
    }
}
