<?php

namespace Bss\W6\Api\Data;

interface InternshipInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const DATE_OF_BIRTH = 'date_of_birth';
    const GENDER = 'gender';
    const EMAIL = 'email';
    const ADDRESS = 'address';

    /**
     * Get Id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set Id.
     *
     * @return $this
     */
    public function setId($id);

    /**
     * Get First Name.
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set First Name.
     *
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * Get Last Name.
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set Last Name.
     *
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * Get Date Of Birth.
     *
     * @return string
     */
    public function getDateOfBirth();

    /**
     * Set Date Of Birth.
     *
     * @return $this
     */
    public function setDateOfBirth($dateOfBirth);

    /**
     * Get Address.
     *
     * @return string
     */
    public function getAddress();

    /**
     * Set Address.
     *
     * @return $this
     */
    public function setAddress($address);

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Email.
     *
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get Gender.
     *
     * @return string
     */
    public function getGender();

    /**
     * Set Gender.
     *
     * @return $this
     */
    public function setGender($gender);
}
