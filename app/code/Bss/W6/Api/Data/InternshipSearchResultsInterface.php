<?php

namespace Bss\W6\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface InternshipSearchResultsInterface
 *
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
