<?php
/**
 * content1
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Report\Block\Content2nd;


use Magento\Customer\Helper\View;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory as CollectionCustomer ;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as CollectionProduct;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as CollectionSales;
use Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory as CollectionFactory ;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Content extends Template
{
    protected $collectionCustomer;
    protected $collectionProduct;
    protected $collectionSales;

    public function __construct(
        Context $context,
        CollectionCustomer $collectionCustomer,
        CollectionProduct $collectionProduct,
        CollectionSales $collectionSales,
        CollectionFactory $collectionInvoice,
        array $data = []
    ) {
        $this->collectionCustomer = $collectionCustomer;
        $this->collectionProduct = $collectionProduct;
        $this->collectionProduct = $collectionProduct;
        $this->collectionSales = $collectionSales;
        $this->collectionInvoice = $collectionInvoice;
        parent::__construct($context, $data);
    }

    public function getCountCustomer()
    {
        $collection = $this->collectionCustomer->create();
        $countcustomer = $collection->getSize();
        return $countcustomer;
    }

    public function getCountProducts()
    {
        $collection = $this->collectionProduct->create();
        $countproduct = $collection->getSize();
        return $countproduct;
    }

    public function getCountSales()
    {
        $collection = $this->collectionSales->create();
        $countsales = $collection->getSize();
        return $countsales;
    }

    public function getCountInvoice()
    {
        $collection = $this->collectionInvoice->create();
        $countinvoice = $collection->getSize();
        return $countinvoice;
    }


}
