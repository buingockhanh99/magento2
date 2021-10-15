<?php
/**
 * Blog
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Model;


class Blog extends \Magento\Framework\Model\AbstractModel
{
    public function _construct() {
        $this->_init('Magenest\Blog\Model\ResourceModel\Blog');
    }
}
