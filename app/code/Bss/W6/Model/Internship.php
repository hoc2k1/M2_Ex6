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
    protected $cacheTag = 'internship';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $eventPrefix = 'internship';

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
     *
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get First Name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * Set First Name.
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * Get Last Name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    /**
     * Set Last Name.
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * Get Date Of Birth.
     *
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->getData(self::DATE_OF_BIRTH);
    }

    /**
     * Set Date Of Birth.
     *
     * @return $this
     */
    public function setDateOfBirth($dateOfBirth)
    {
        return $this->setData(self::DATE_OF_BIRTH, $dateOfBirth);
    }

    /**
     * Get Address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * Set Address.
     *
     * @return $this
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email.
     *
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Gender.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->getData(self::GENDER);
    }

    /**
     * Set Gender.
     *
     * @return $this
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }
}
