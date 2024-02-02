<?php

namespace Bss\W6\Block\Adminhtml\Internship\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 *
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get Button Data Delete
     *
     * @return array
     */
    public function getButtonData()
    {
        /** @var int $param */
        if ($this->getId()) {
            return [
                'label' => __('Delete Internship'),
                'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete this Internship?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'class' => 'delete',
                'sort_order' => 20
            ];
        }
        return [];
    }

    /**
     * Get url delete
     *
     * @return mixed
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/internship/delete', ['id' => $this->getId()]);
    }
}
