<?php
namespace Bss\W6\Controller\Adminhtml\Internship;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Bss\W6\Model\InternshipFactory;
use Magento\Framework\Controller\ResultFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var \Bss\W6\Model\InternshipFactory
     */
    protected $collectionFactory;

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Bss\W6\Model\InternshipFactory $collectionFactory
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     */
    public function __construct(
        Context $context,
        InternshipFactory $collectionFactory,
        Filter $filter
    ) {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
        $this->filter = $filter;
    }

    /**
     * Execute action
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $deletedItems = 0;

        foreach ($collection->getItems() as $item) {
            $item->delete();
            $deletedItems++;
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been deleted.', $deletedItems)
        );

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/index');
    }
}
