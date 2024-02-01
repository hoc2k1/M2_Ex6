<?php

namespace Bss\W6\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Bss\W6\Model\InternshipFactory;

class Internship extends Action
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;
    /**
     * @var InternshipFactory
     */
    protected $_internshipFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param InternshipFactory $internshipFactory
     */
    public function __construct(
        Context           $context,
        Registry          $coreRegistry,
        PageFactory       $resultPageFactory,
        InternshipFactory $internshipFactory
    )
    {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_internshipFactory = $internshipFactory;

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
    protected function _isAllowed()
    {
        return true;
    }
}
