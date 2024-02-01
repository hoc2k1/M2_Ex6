<?php
namespace Bss\W6\Controller\Adminhtml\Internship;

use Bss\W6\Model\InternshipFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
/**
 * Class Edit
 *
 * @package Bss\W6\Controller\Adminhtml\Internship
 */
class Edit extends Action
{
    /**
     * @var InternshipFactory
     */
    protected $internshipFactory;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var Redirect
     */
    protected $redirect;

    /**
     * Edit constructor.
     * @param Context $context
     * @param InternshipFactory $internshipFactory
     * @param Session $session
     * @param Registry $registry
     * @param PageFactory $resultPageFactory
     * @param Redirect $redirect
     */
    public function __construct(
        Context $context,
        InternshipFactory $internshipFactory,
        Session $session,
        Registry $registry,
        PageFactory $resultPageFactory,
        Redirect $redirect
    ) {
        parent::__construct($context);
        $this->internshipFactory = $internshipFactory;
        $this->session = $session;
        $this->registry = $registry;
        $this->redirect = $redirect;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Edit a Agency
     *
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->internshipFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('week6/internship/rowdata');
                return;
            }
        }

        $this->registry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Internship').$rowTitle : __('Add Internship');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    /**
     * ACL controller
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bss_W6::edit');
    }
}
