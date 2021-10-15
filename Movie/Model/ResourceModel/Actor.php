<?php
/**
 * Actor
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model\ResourceModel;


class Actor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_actor', 'actor_id');
    }
}
