<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Report\Model\ResourceModel\SetupModule;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'module';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Report\Model\SetupModule::class,
            \Magenest\Report\Model\ResourceModel\SetupModule::class
        );
    }
}
