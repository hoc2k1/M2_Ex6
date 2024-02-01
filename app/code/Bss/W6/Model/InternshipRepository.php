<?php

namespace Bss\W6\Model;

use Bss\W6\Api\Data\InternshipInterface;
use Bss\W6\Api\Data\InternshipSearchResultsInterface;
use Bss\W6\Model\ResourceModel\Internship;
use Bss\W6\Model\ResourceModel\Internship\CollectionFactory;
use Bss\W6\Api\InternshipRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Bss\W6\Model\InternshipFactory;

/**
 * Class InternshipRepository
 *
 * @package Bss\W6\Model
 */
class InternshipRepository implements InternshipRepositoryInterface
{
    /**
     * Error message codes
     */
    protected const ERROR_SAVE = 'NOT_SAVE';
    protected const ERROR_DELETE = 'NOT_DELETE';
    protected const ERROR_UNDEFINED = 'UNDEFINED';
    protected const ERROR_UNDEFINED_ITEM = 'UNDEFINED';

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $criteriaBuilder;

    /**
     * @var CollectionProcessor
     */
    protected $collectionProcessor;

    /**
     * @var CollectionFactory
     */
    protected $internshipCollection;

    /**
     * @var SearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * Instances
     *
     * @var array
     */
    protected $instances = [];

    /**
     * @var ResourceModel\Internship
     */
    protected $resource;

    /**
     * @var InternshipFactory
     */
    protected $internshipFactory;

    /**
     * InternshipRepository constructor.
     *
     * @param SearchCriteriaBuilder $criteriaBuilder
     * @param CollectionProcessor $collectionProcessor
     * @param CollectionFactory $internshipCollection
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param Internship $resource
     * @param Bss\W6\Model\InternshipFactory $internshipFactory
     */
    public function __construct(
        \Magento\Framework\Api\SearchCriteriaBuilder             $criteriaBuilder,
        CollectionProcessor                                      $collectionProcessor,
        \Bss\W6\Model\ResourceModel\Internship\CollectionFactory $internshipCollection,
        SearchResultsInterfaceFactory                            $searchResultsFactory,
        ResourceModel\Internship                                 $resource,
        InternshipFactory                                        $internshipFactory,
    )
    {
        $this->criteriaBuilder = $criteriaBuilder;
        $this->collectionProcessor = $collectionProcessor;
        $this->internshipCollection = $internshipCollection;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->resource = $resource;
        $this->internshipFactory = $internshipFactory;
    }

    /**
     * Get Internship by id
     *
     * @param $id
     * @return InternshipInterface|Internship|mixed
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        if (!isset($this->instances[$id])) {
            $mInternship = $this->internshipFactory->create();
            $this->resource->load($mInternship, $id);

            if (!$mInternship->getId()) {
                throw new NoSuchEntityException(__('Internship with id "%1" does not exist.', $id));
            }
            $this->instances[$id] = $mInternship;
        }
        return $this->instances[$id];
    }

    /**
     * Save Internship
     *
     * @param \Bss\W6\Api\Data\InternshipInterface $internship
     * @return \Bss\W6\Api\Data\InternshipInterface|mixed
     * @throws CouldNotSaveException
     */
    public function save($internship)
    {
        try {
            $validateExistEmail = $this->validateExistEmail($internship->getEmail());
            if (!$validateExistEmail) {
                $this->resource->save($internship);
                return $internship;
            }
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __(
                    'Could not save internship: %1',
                    $exception->getMessage()
                )
            );
        }
        throw new CouldNotSaveException(
            __($validateExistEmail)
        );
    }


    /**
     * Edit Internship
     *
     * @param $internship
     * @return mixed
     * @throws CouldNotSaveException
     */
    public function edit($internship)
    {
        try {
            $validateExistEmail = $this->validateExistEmail($internship->getEmail(), $internship->getId());
            if (!$validateExistEmail) {
                $this->resource->save($internship);
                return $internship;
            }
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __(
                    'Could not save internship: %1',
                    $exception->getMessage()
                )
            );
        }
        throw new CouldNotSaveException(
            __($validateExistEmail)
        );
    }

    /**
     * Delete internship by id
     *
     * @param $id
     * @return array
     */
    public function deleteInternshipById($id)
    {
        try {
            $internShip = $this->getById($id);
            $this->resource->delete($internShip);
            $result["status"] = [
                "success" => true,
                "message" => __("You deleted.")
            ];

        } catch (\Exception $exception) {
            $result["status"] = [
                "success" => false,
                "message" => __($exception->getMessage())
            ];
        }
        return $result;
    }


    /**
     *
     * Check exist email
     *
     * @param $email
     * @return bool
     */
    public function validateExistEmail($email, $id = null)
    {
        if (!$email) {
            return __("email should be specified");
        }

        $existInternship = $this->getByEmail($email);
        if ($existInternship) {
            // compare email edit
            if ($id && $existInternship->getId() == $id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * Get list Internship
     *
     * @param SearchCriteriaInterface $criteria
     * @return InternshipSearchResultsInterface|SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $collection = $this->internshipCollection->create();
        $this->collectionProcessor->process($criteria, $collection);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Get Internship by Email
     *
     * @param $email
     * @return array|InternshipInterface|Internship|null
     */
    public function getByEmail($email)
    {
        if (!isset($this->instances[$email])) {
            $mInternship = $this->internshipFactory->create();
            $this->resource->load($mInternship, $email, "email");
            if (!$mInternship->getEmail()) {
                return null;
            } else {
                $this->instances[$email] = $mInternship;
                return $mInternship;
            }
        }
        return $this->instances;
    }

}
