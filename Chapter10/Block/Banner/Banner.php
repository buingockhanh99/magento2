<?php
/**
 * Banner
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Block\Banner;

use Magento\Framework\Setup\Exception;
use Magento\Framework\View\Element\Template;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Customer\Helper\View;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magenest\Chapter10\Model\ResourceModel\Banner\CollectionFactory as CollectBanner;

class Banner extends Template
{
    protected $_subscription;
    protected $_helperView;
    protected $collection;
    private $storeManager;

    /**
     * Constructor
     *
     * @param Context $context
     * @param CurrentCustomer $currentCustomer
     * @param View $helperView
     * @param array $data
     */
    public function __construct(
        Context               $context,
        StoreManagerInterface $storeManager,
        CollectBanner         $collection,
        View                  $helperView,
        array                 $data = []
    )
    {
        $this->storeManager = $storeManager;
        $this->collection = $collection;
        $this->_helperView = $helperView;
        parent::__construct($context, $data);
    }


    public function getIMG()
    {
        $model = $this->collection->create();
        $data = $model->getItemById(1);
        if($data == null) return 'null';

        $status = $data->getData('enabled');
        if($status == '2') return 'null';

        $pathImg = $data->getData('image');
        $url = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'banner/images/' . $pathImg;
        return $url;
    }

}
