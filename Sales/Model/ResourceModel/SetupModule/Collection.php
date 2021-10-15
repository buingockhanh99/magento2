<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Sales\Model\ResourceModel\SetupModule;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\View\Element\UiComponent\DataProvider\Document;
use Magento\MysqlMq\Model\QueueManagement;
use Magento\MysqlMq\Model\ResourceModel\MessageStatus;
use Magenest\Sales\Model\ResourceModel\SetupModule;

class Collection extends AbstractCollection
{

    public function getTotalCount()
    {
        return $this->getSize();
    }

    protected function _construct()
    {
        $this->_init(
            Document::class,
            SetupModule::class
        );
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->joinTable();
        return $this;
    }

    private function joinTable()
    {
        $this->getSelect()
            ->joinInner(
            ['sOrder' => $this->getTable('sales_order')],
            'main_table.order_id = sOrder.entity_id',
            [
                'increment_id' => 'sOrder.increment_id',
                'customer_lastname' => 'sOrder.customer_lastname',
                'customer_email' => 'sOrder.customer_email',
            ]
        )->joinInner(
            ['st' => $this->getTable('store')],
            'main_table.store_id = st.store_id',
        )->joinInner(
            ['website' => $this->getTable('store_website')],
            'st.website_id = website.website_id',
            ['nameweb' => 'website.name']
        );

        return $this;
    }

}


