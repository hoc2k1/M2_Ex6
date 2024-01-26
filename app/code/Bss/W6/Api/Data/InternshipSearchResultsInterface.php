<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * @category   BSS
 * @package    Bss_W6
 * @author     Extension Team
 * @copyright  Copyright (c) 2018-2019 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\W6\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface InternshipSearchResultsInterface
 *
 * @package Bss\W6\Api\Data
 */
interface InternshipSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get items
     *
     * @return \Bss\W6\Api\Data\InternshipInterface[]
     */
    public function getItems();

    /**
     * Set items
     *
     * @param \Bss\W6\Api\Data\InternshipInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
