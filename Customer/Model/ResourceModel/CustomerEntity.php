<?php
/**
 * CustomerEntity
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Model\ResourceModel;


class CustomerEntity extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_entity', 'entity_id');
    }
}
