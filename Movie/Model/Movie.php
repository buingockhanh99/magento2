<?php
/**
 * Movie
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model;
use Magento\Framework\Api\DataObjectHelper;

class Movie extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'magenest_movie';
    protected $dataObjectHelper;

    protected $studentDataFactory;


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,

        DataObjectHelper $dataObjectHelper,
        \Magenest\Movie\Model\ResourceModel\Movie $resource,
        \Magenest\Movie\Model\ResourceModel\Movie\CollectionMovie $resourceCollection,
        array $data = []
    ) {

        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getDataModel($teacherDataObject)
    {
        $movieData = $this->getData();

        $movieDataObject = $this->movieDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $movieDataObject,
            $movieData,
            MovieInterface::class
        );

        return $teacherDataObject;
    }
}
