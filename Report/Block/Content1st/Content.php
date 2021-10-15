<?php
/**
 * content1
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Report\Block\Content1st;

use Magenest\Report\Model\ResourceModel\SetupModule\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Content extends Template
{
    protected $collectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCountModule()
    {
        $collection = $this->collectionFactory->create();
        $countmodule = $collection->getSize();
        return $countmodule;
    }



}
