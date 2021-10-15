<?php
/**
 * MovieActor
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model;
use Magento\Framework\Api\DataObjectHelper;

class MovieActor extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'magenest_movie_actor';
    protected $dataObjectHelper;

    protected $studentDataFactory;


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,

        DataObjectHelper $dataObjectHelper,
        \Magenest\Movie\Model\ResourceModel\MovieActor $resource,
        \Magenest\Movie\Model\ResourceModel\Movie\CollectionMovieActor $resourceCollection,
        array $data = []
    ) {

        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getDataModel($teacherDataObject)
    {
        $movieactorData = $this->getData();

        $movieactorDataObject = $this->movieactorDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $movieactorDataObject,
            $movieactorData,
            MovieActorInterface::class
        );

        return $teacherDataObject;
    }
}
