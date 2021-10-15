<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Model\ResourceModel\Customer;



class Collection  extends \Magento\Eav\Model\Entity\Collection\VersionControl\AbstractCollection
{

    protected function _construct()
    {
        $this->_init(\Magento\Customer\Model\Customer::class, \Magento\Customer\Model\ResourceModel\Customer::class);
    }
    public function jointTable()
    {
        $this->getSelect()->joinLeft(
            ['customerEntity' => $this->getTable('customer_entity_varchar')],
            'main_table.entity_id = customerEntity.entity_id',
            [
                'img_name' => 'customerEntity.value',
            ]
        );

        return $this;
    }


}
