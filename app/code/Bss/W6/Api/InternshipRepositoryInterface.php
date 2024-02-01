<?php

namespace Bss\W6\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface InternshipRepositoryInterface
 *
 */
interface InternshipRepositoryInterface
{
    /**
     * Get internship by id
     *
     * @param int $id
     * @return \Bss\W6\Api\Data\InternshipInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * Get internship by email
     *
     * @param string $email
     * @return \Bss\W6\Api\Data\InternshipInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByEmail($email);

    /**
     * Save internship
     *
     * @param \Bss\W6\Api\Data\InternshipInterface $internship
     * @return \Bss\W6\Api\Data\InternshipInterface
     * @throws CouldNotSaveException
     */
    public function save($internship);

    /**
     * Delete internship
     *
     * @param int $id
     * @return mixed
     * @throws CouldNotSaveException
     */
    public function deleteInternshipById($id);

    /**
     * Get list internship
     *
     * @param SearchCriteriaInterface $criteria
     * @return \Bss\W6\Api\Data\InternshipSearchResultsInterface|\Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

}
