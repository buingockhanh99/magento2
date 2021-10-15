<?php
declare(strict_types=1);

namespace Magenest\Student\Model;

use Magenest\Student\Api\Data\StudentInterface;
use Magenest\Student\Api\Data\StudentInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Student extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'magenest_student_student';
    protected $dataObjectHelper;

    protected $studentDataFactory;


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        StudentInterfaceFactory $studentDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Magenest\Student\Model\ResourceModel\Student $resource,
        \Magenest\Student\Model\ResourceModel\Student\Collection $resourceCollection,
        array $data = []
    ) {
        $this->studentDataFactory = $studentDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve student model with student data
     * @return StudentInterface
     */
    public function getDataModel()
    {
        $studentData = $this->getData();

        $studentDataObject = $this->studentDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $studentDataObject,
            $studentData,
            StudentInterface::class
        );

        return $studentDataObject;
    }
}

