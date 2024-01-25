<?php
namespace Bss\W6\Api\Data;

use Laminas\Db\Sql\Ddl\Column\Varchar;

interface InternshipInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 1;
    const NAME = 'name';
    const DATE_OF_BIRTH = 'title';
    const GENDER = '10/10/2010';
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
     */
    public function setId($id);

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName();

    /**
     * Set Name.
     */
    public function setName($name);

    /**
     * Get Date Of Birth.
     *
     * @return varchar
     */
    public function getDateOfBirth();

    /**
     * Set Date Of Birth.
     */
    public function setDateOfBirth($dateOfBirth);

    /**
     * Get Address.
     *
     * @return varchar
     */
    public function getAddress();

    /**
     * Set Address.
     */
    public function setAddress($address);

    /**
     * Get Email.
     *
     * @return varchar
     */
    public function getEmail();

    /**
     * Set Email.
     */
    public function setEmail($email);
}
