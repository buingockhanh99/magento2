<?php
/**
 * Director
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model;
use Magento\Framework\Api\DataObjectHelper;

class Director extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'magenest_director';
    protected $_eventObject = 'magenest_director';
    protected $dataObjectHelper;



    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,

        DataObjectHelper $dataObjectHelper,
        \Magenest\Movie\Model\ResourceModel\Director $resource,
        \Magenest\Movie\Model\ResourceModel\Director\CollectionDirector $resourceCollection,
        array $data = []
    ) {

        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getDataModel($DataObject)
    {
        $directorData = $this->getData();

        $directorDataObject = $this->directorDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $directorDataObject,
            $directorData,
            DirectorInterface::class
        );

        return $DataObject;
    }
}
