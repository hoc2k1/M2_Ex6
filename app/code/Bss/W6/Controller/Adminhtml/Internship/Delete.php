<?php

namespace Bss\W6\Controller\Adminhtml\Internship;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Bss\W6\Model\InternshipRepository;

/**
 * Class Delete
 *
 * @package Bss\W6\Controller\Adminhtml\Index
 */
class Delete extends Action
{
    /**
     * @var Redirect
     */
    protected $redirect;

    /**
     * @var InternshipRepository
     */
    protected InternshipRepository $internshipRepository;

    /**
     * @param Context $context
     * @param Redirect $redirect
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        Context              $context,
        Redirect             $redirect,
        InternshipRepository $internshipRepository
    ) {
        parent::__construct($context);
        $this->redirect = $redirect;
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * Delete internship
     *
     * @return Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        try {
            $this->internshipRepository->deleteInternshipById($id);
            $this->messageManager->addSuccessMessage(
                __('Delete successfully!')
            );
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $this->redirect->setPath('*/internship/index');
    }

    /**
     * ACL controller
     *
     * @return bool
     */
    protected function isAllowed()
    {
        return $this->_authorization->isAllowed('Bss_W6::internship');
    }
}
