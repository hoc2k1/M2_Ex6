<?php
namespace Bss\W6\Controller\Adminhtml\Internship;

use Bss\W6\Controller\Adminhtml\Internship;
use Bss\W6\Model\InternshipFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends Internship
{
    const ADMIN_RESOURCE = 'Bss_W6::internship';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param InternshipFactory $internshipFactory
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        InternshipFactory $internshipFactory,
        ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $internshipFactory);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return Page|void
     */
    public function execute()
    {
        if (!$this->_authorization->isAllowed(static::ADMIN_RESOURCE) || !$this->scopeConfig->getValue('week6/internship/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE)) {
            $this->_redirect('admin/dashboard/index');
            $this->messageManager->addErrorMessage(__('You do not have enough permissions to access this page, please contact the administrator!'));
            return;
        }

        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Bss_W6::week6');
        $resultPage->getConfig()->getTitle()->prepend(__('Internship'));

        return $resultPage;
    }
}
