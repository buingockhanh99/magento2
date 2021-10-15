<?php
/**
 * CollectionDirector
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel\Director;


class CollectionDirector extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'director_id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Movie\Model\Director::class,
            \Magenest\Movie\Model\ResourceModel\Director::class
        );
    }

    public function jointTable()
    {
        $this->getSelect()->joinLeft(
            ['movie' => $this->getTable('magenest_movie')],
            'main_table.director_id = movie.director_id',
            [
                'movie_name' => 'movie.name',
                'movie_id' => "movie.movie_id"
            ]
        );

        return $this;

    }
}
