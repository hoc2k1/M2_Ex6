<?php
namespace Bss\W6\Model\ResourceModel\Internship;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(\Bss\W6\Model\Internship::class, \Bss\W6\Model\ResourceModel\Internship::class);
    }
}
