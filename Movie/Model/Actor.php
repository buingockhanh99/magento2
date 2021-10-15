<?php
/**
 * Actor
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model;
use Magento\Framework\Api\DataObjectHelper;

class Actor extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'magenest_actor';
    protected $dataObjectHelper;

    protected $studentDataFactory;


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,

        DataObjectHelper $dataObjectHelper,
        \Magenest\Movie\Model\ResourceModel\Actor $resource,
        \Magenest\Movie\Model\ResourceModel\Actor\CollectionActor $resourceCollection,
        array $data = []
    ) {

        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getDataModel($teacherDataObject)
    {
        $actorData = $this->getData();

        $actorDataObject = $this->actorDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $actorDataObject,
            $actorData,
            ActorInterface::class
        );

        return $teacherDataObject;
    }
}
