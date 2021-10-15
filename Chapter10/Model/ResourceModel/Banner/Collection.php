<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Model\ResourceModel\Banner;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'banner_id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Chapter10\Model\Banner::class,
            \Magenest\Chapter10\Model\ResourceModel\Banner::class
        );
    }
}
