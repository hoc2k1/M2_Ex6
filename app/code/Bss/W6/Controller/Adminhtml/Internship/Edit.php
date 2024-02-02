<?php

namespace Bss\W6\Controller\Adminhtml\Internship;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Bss\W6\Model\InternshipRepository;

/**
 * Class Edit
 *
 * @package Bss\W6\Controller\Adminhtml\Internship
 */
class Edit extends Action
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var Redirect
     */
    protected $redirect;


    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    /**
     * @param Context $context
     * @param Session $session
     * @param PageFactory $resultPageFactory
     * @param Redirect $redirect
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        Context              $context,
        Session              $session,
        PageFactory          $resultPageFactory,
        Redirect             $redirect,
        InternshipRepository $internshipRepository
    ) {
        parent::__construct($context);
        $this->session = $session;
        $this->redirect = $redirect;
        $this->resultPageFactory = $resultPageFactory;
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * Edit/Add new internship page
     *
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Internship') : __('Add Internship');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    /**
     * ACL controller
     *
     * @return bool
     */
    protected function isAllowed()
    {
        return $this->_authorization->isAllowed('Bss_W6::edit');
    }
}
