<?php
/**
 * Url
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Model;

class Url extends \Magento\Framework\Model\AbstractModel
{
    public function _construct() {
        $this->_init('Magento\Catalog\Model\ResourceModel\Url');
    }
}
