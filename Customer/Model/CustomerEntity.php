<?php
/**
 * CustomerEntity
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Model;


class CustomerEntity extends \Magento\Framework\Model\AbstractModel
{
    public function _construct() {
        $this->_init('Magenest\Customer\Model\ResourceModel\CustomerEntity');
    }
}
