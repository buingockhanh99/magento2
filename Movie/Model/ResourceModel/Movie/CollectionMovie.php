<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel\Movie;


class CollectionMovie extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'movie_id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Movie\Model\Movie::class,
            \Magenest\Movie\Model\ResourceModel\Movie::class
        );
    }

    public function jointTable()
    {
        $this->getSelect()->joinLeft(
            ['director' => $this->getTable('magenest_director')],
            'main_table.director_id = director.director_id',
            [
                'director_name' => 'director.name',
                'director_id' => "director.director_id"
            ]
        );

        return $this;
    }
}
