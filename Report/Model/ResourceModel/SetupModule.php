<?php
/**
 * SetupModule
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Report\Model\ResourceModel;


class SetupModule  extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('setup_module', 'module');
    }
}
