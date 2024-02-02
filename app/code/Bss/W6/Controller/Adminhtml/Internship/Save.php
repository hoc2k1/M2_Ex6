<?php

namespace Bss\W6\Controller\Adminhtml\Internship;

use Bss\W6\Model\InternshipRepository;

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
     * @var InternshipRepository
     */
    protected $internshipRepository;


    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Bss\W6\Model\InternshipFactory $internshipFactory
     * @param \Magento\Framework\Event\ManagerInterface $eventManager
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        \Magento\Backend\App\Action\Context       $context,
        \Bss\W6\Model\InternshipFactory           $internshipFactory,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        InternshipRepository                      $internshipRepository
    ) {
        parent::__construct($context);
        $this->internshipFactory = $internshipFactory;
        $this->eventManager = $eventManager;
        $this->internshipRepository = $internshipRepository;
    }

    /**
     *
     * Save Internship
     *
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
            if (isset($data['id']) && $data['id']) {
                $rowData->setEntityId($data['id']);
                $rowData->setData($data);
                $this->internshipRepository->edit($rowData);
            } else {
                unset($data["id"]);
                $rowData->setData($data);
                $this->internshipRepository->save($rowData);
            }

            $this->messageManager->addSuccessMessage(__('Your data has been saved!'));
        } catch (\Exception $e) {
            $errorMessage = "There was an error while saving Internship data, please try again!";
            $this->messageManager->addErrorMessage(__($errorMessage));
        }
        $this->_redirect('week6/internship/index');
    }

    /**
     * @return bool
     */
    protected function isAllowed()
    {
        return $this->_authorization->isAllowed('Bss_W6::save');
    }
}
