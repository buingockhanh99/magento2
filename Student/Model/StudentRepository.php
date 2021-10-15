<?php
declare(strict_types=1);

namespace Magenest\Student\Model;

use Magenest\Student\Api\Data\StudentInterfaceFactory;
use Magenest\Student\Api\Data\StudentSearchResultsInterfaceFactory;
use Magenest\Student\Api\StudentRepositoryInterface;
use Magenest\Student\Model\ResourceModel\Student as ResourceStudent;
use Magenest\Student\Model\ResourceModel\Student\CollectionFactory as StudentCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class StudentRepository implements StudentRepositoryInterface
{

    protected $studentFactory;

    protected $studentCollectionFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $dataStudentFactory;


    /**
     * @param ResourceStudent $resource
     * @param StudentFactory $studentFactory
     * @param StudentInterfaceFactory $dataStudentFactory
     * @param StudentCollectionFactory $studentCollectionFactory
     * @param StudentSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceStudent $resource,
        StudentFactory $studentFactory,
        StudentInterfaceFactory $dataStudentFactory,
        StudentCollectionFactory $studentCollectionFactory,
        StudentSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->studentFactory = $studentFactory;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataStudentFactory = $dataStudentFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Magenest\Student\Api\Data\StudentInterface $student
    ) {
        /* if (empty($student->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $student->setStoreId($storeId);
        } */
        
        $studentData = $this->extensibleDataObjectConverter->toNestedArray(
            $student,
            [],
            \Magenest\Student\Api\Data\StudentInterface::class
        );
        
        $studentModel = $this->studentFactory->create()->setData($studentData);
        
        try {
            $this->resource->save($studentModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the student: %1',
                $exception->getMessage()
            ));
        }
        return $studentModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($studentId)
    {
        $student = $this->studentFactory->create();
        $this->resource->load($student, $studentId);
        if (!$student->getId()) {
            throw new NoSuchEntityException(__('Student with id "%1" does not exist.', $studentId));
        }
        return $student->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->studentCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Magenest\Student\Api\Data\StudentInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Magenest\Student\Api\Data\StudentInterface $student
    ) {
        try {
            $studentModel = $this->studentFactory->create();
            $this->resource->load($studentModel, $student->getStudentId());
            $this->resource->delete($studentModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Student: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($studentId)
    {
        return $this->delete($this->get($studentId));
    }
}

