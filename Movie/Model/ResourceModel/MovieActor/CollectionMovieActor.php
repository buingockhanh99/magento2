<?php
/**
 * CollectionMovieActor
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel\MovieActor;


class CollectionMovieActor extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Movie\Model\MovieActor::class,
            \Magenest\Movie\Model\ResourceModel\MovieActor::class
        );
    }
}
