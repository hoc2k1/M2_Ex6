<?php
namespace Bss\W6\Controller\Adminhtml\Internship;

use Bss\W6\Controller\Adminhtml\Internship;
use Bss\W6\Model\InternshipFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Index extends Internship
{
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        InternshipFactory $internshipFactory
    )
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $internshipFactory);
    }
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Bss_W6::week6');
        $resultPage->getConfig()->getTitle()->prepend(__('AddRow'));

        return $resultPage;
    }
}
