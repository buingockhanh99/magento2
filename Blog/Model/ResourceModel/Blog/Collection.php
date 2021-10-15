<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Model\ResourceModel\Blog;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Magenest\Blog\Model\Blog::class,
            \Magenest\Blog\Model\ResourceModel\Blog::class
        );
    }
}
