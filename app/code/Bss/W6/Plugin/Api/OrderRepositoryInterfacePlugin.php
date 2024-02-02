<?php

namespace Bss\W6\Plugin\Api;

use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderRepositoryInterfacePlugin
{
    protected $orderExtensionFactory;

    public function __construct(OrderExtensionFactory $orderExtensionFactory)
    {
        $this->orderExtensionFactory = $orderExtensionFactory;
    }

    /**
     * Add new column when get order api
     *
     * @param OrderRepositoryInterface $subject
     * @param OrderInterface $order
     * @return OrderInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGet(OrderRepositoryInterface $subject, OrderInterface $order)
    {
        // Retrieve your custom data and set it to the extension attribute
        $newRowData = $order->getData('w6_new_column');

        $extensionAttributes = $order->getExtensionAttributes();

        if ($extensionAttributes === null) {
            $extensionAttributes = $this->orderExtensionFactory->create();
        }

        $extensionAttributes->setW6NewAttribute($newRowData);
        $order->setExtensionAttributes($extensionAttributes);

        return $order;
    }
}
