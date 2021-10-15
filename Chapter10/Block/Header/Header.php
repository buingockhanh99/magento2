<?php
/**
 * Header
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Block\Header;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Result\PageFactory;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory;

class Header extends Template
{

    protected $layoutProcessors;
    protected $collectionFactory;
    public function __construct(
        CollectionFactory $collectionFactory,
        Template\Context $context,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->layoutProcessors = $layoutProcessors;
        $this->collectionFactory = $collectionFactory;
    }

    public function dataJSON(){
        $model = $this->collectionFactory->create();
        $value = $model->getItemById(242)->getData('value');
        return $value;
    }


}
