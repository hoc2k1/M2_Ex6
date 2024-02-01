<?php
namespace Bss\W6\Controller\Adminhtml\Internship;

use Bss\W6\Model\InternshipFactory;
use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\View\Result\PageFactory;
use Bss\W6\Model\InternshipRepository;

/**
 * Class Delete
 *
 * @package Bss\W6s\Controller\Adminhtml\Index
 */
class Delete extends Action
{
    /**
     * @var InternshipFactory
     */
    protected $internshipFactory;

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
     * @param InternshipFactory $internshipFactory
     * @param Redirect $redirect
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        Context $context,
        InternshipFactory $internshipFactory,
        Redirect $redirect,
        InternshipRepository $internshipRepository
    ) {
        parent::__construct($context);
        $this->internshipFactory = $internshipFactory;
        $this->redirect = $redirect;
        $this->internshipRepository = $internshipRepository;
    }

    /**
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
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bss_W6::internship');
    }
}
