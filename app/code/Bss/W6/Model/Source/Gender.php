<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_Agencies
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2020 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
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
            ['value' =>  "Male", 'label' => __('Male')],
            ['value' => "Female", 'label' => __('Female')],
        ];
    }
}
