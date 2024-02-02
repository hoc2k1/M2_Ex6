<?php

namespace Bss\W6\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Bss\W6\Model\InternshipFactory;

class Internship extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var InternshipFactory
     */
    protected $internshipFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param InternshipFactory $internshipFactory
     */
    public function __construct(
        Context           $context,
        PageFactory       $resultPageFactory,
        InternshipFactory $internshipFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->internshipFactory = $internshipFactory;
    }

    /**
     * @return void
     */
    public function execute()
    {
    }

    /**
     * @return true
     */
    protected function isAllowed()
    {
        return true;
    }
}
