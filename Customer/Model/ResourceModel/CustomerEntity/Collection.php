<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Model\ResourceModel\CustomerEntity;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{


    protected function _construct()
    {
        $this->_init(
            \Magenest\Customer\Model\CustomerEntity::class,
            \Magenest\Customer\Model\ResourceModel\CustomerEntity::class
        );
    }

}
