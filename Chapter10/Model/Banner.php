<?php
/**
 * Banner
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Api\DataObjectHelper;

class Banner extends AbstractModel
{
    protected $_eventPrefix = 'magenest_banner';
    protected $dataObjectHelper;



    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        DataObjectHelper $dataObjectHelper,
        \Magenest\Chapter10\Model\ResourceModel\Banner $resource,
        \Magenest\Chapter10\Model\ResourceModel\Banner\Collection $resourceCollection,
        array $data = []
    ) {

        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getDataModel()
    {
        $bannerData = $this->getData();


        $bannerDataObject = $this->bannerDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $bannerDataObject,
            $bannerData,
            BannerInterface::class
        );

        return $bannerDataObject;
    }
}
