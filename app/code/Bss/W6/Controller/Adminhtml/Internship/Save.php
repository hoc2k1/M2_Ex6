<?php

/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  Webkul
 * @package   Webkul_Grid
 * @author    Webkul
 * @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Bss\W6\Controller\Adminhtml\Internship;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Bss\W6\Model\InternshipFactory
     */
    var $internshipFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Bss\W6\Model\InternshipFactory $internshipFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Bss\W6\Model\InternshipFactory $internshipFactory
    ) {
        parent::__construct($context);
        $this->internshipFactory = $internshipFactory;
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
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
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
