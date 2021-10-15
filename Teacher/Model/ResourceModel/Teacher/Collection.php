<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Teacher\Model\ResourceModel\Teacher;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'teacher_id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Teacher\Model\Teacher::class,
            \Magenest\Teacher\Model\ResourceModel\Teacher::class
        );
    }
}
