<?php

namespace Bss\W6\Model\Source;

/**
 * Class Status
 *
 * @package Bss\Agencies\Model\Source
 */
class Gender implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options for Type
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => "male", 'label' => __('Male')],
            ['value' => "female", 'label' => __('Female')],
        ];
    }
}
