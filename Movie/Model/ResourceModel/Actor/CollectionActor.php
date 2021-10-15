<?php
/**
 * CollectionActor
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel\Actor;


class CollectionActor extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'actor_id';


    protected function _construct()
    {
        $this->_init(
            \Magenest\Movie\Model\Actor::class,
            \Magenest\Movie\Model\ResourceModel\Actor::class
        );
    }
    public function jointTable(){

        $this->getSelect()
            ->joinInner(
                ['ma' => $this->getTable('magenest_movie_actor')],
                'main_table.actor_id = ma.actor_id',
                ['movie_id' => 'ma.movie_id']
            )->joinInner(
                ['mma' => $this->getTable('magenest_movie')],
                'ma.movie_id = mma.movie_id',
                ['movie_name' => 'mma.name']
            );
        return $this;
    }

}
