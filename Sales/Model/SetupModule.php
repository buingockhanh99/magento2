<?php
/**
 * SetupModule
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Sales\Model;


class SetupModule extends \Magento\Framework\Model\AbstractModel
{
    public function _construct() {
        $this->_init('Magenest\Sales\Model\ResourceModel\SetupModule');
    }
}
