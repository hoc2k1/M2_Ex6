<?php
namespace Bss\W6\Model;

use Bss\W6\Api\Data\InternshipInterface;

class Internship extends \Magento\Framework\Model\AbstractModel implements InternshipInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'internship';

    /**
     * @var string
     */
    protected $_cacheTag = 'internship';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'internship';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Bss\W6\Model\ResourceModel\Internship');
    }
    /**
     * Get Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set Id.
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Date Of Birth.
     *
     * @return varchar
     */
    public function getDateOfBirth()
    {
        return $this->getData(self::DATE_OF_BIRTH);
    }

    /**
     * Set Date Of Birth.
     */
    public function setDateOfBirth($dateOfBirth)
    {
        return $this->setData(self::DATE_OF_BIRTH, $dateOfBirth);
    }

    /**
     * Get Address.
     *
     * @return varchar
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * Set Address.
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Get Email.
     *
     * @return varchar
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email.
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
}
