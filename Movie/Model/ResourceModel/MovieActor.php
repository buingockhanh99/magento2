<?php
/**
 * MovieActor
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel;


class MovieActor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_movie_actor', 'movie_id');
        $this->_init('magenest_movie_actor', 'actor_id');
    }
}
