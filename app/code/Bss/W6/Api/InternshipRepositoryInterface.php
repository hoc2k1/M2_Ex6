<?php
namespace Bss\W6\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface InternshipRepositoryInterface
 *
 * @package Bss\W6\Api
 * @api
 */
interface InternshipRepositoryInterface
{
    /**
     * Get internship from id
     *
     * @param int $id
     * @return \Bss\W6\Api\Data\InternshipInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

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
