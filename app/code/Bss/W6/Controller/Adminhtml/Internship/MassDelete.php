<?php

namespace Bss\W6\Controller\Adminhtml\Internship;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Bss\W6\Model\ResourceModel\Internship\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;
use Bss\W6\Model\InternshipRepository;
use \Magento\Backend\App\Action;

class MassDelete extends Action
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        Context              $context,
        CollectionFactory    $collectionFactory,
        Filter               $filter,
        InternshipRepository $internshipRepository
    ) {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
        $this->filter = $filter;
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * Execute action
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $count = 0;

        foreach ($collection->getItems() as $item) {
            $this->internshipRepository->deleteInternshipById($item->getId());
            $count++;
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 record(s) have been deleted.', $count)
        );

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/index');
    }
}
