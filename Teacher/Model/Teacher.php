<?php


namespace Magenest\Teacher\Model;
use Magento\Framework\Api\DataObjectHelper;

class Teacher extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'magenest_teacher_teacher';
    protected $dataObjectHelper;

    protected $studentDataFactory;


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,

        DataObjectHelper $dataObjectHelper,
        \Magenest\Teacher\Model\ResourceModel\Teacher $resource,
        \Magenest\Teacher\Model\ResourceModel\Teacher\Collection $resourceCollection,
        array $data = []
    ) {

        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getDataModel()
    {
        $teacherData = $this->getData();

        $teacherDataObject = $this->teacherDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $teacherDataObject,
            $teacherData,
            TeacherInterface::class
        );

        return $teacherDataObject;
    }
}
