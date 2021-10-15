<?php
/**
 * SaveTime
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\EditProduct\Observer;

use Magento\Framework\Event\ObserverInterface;

class SaveTime implements ObserverInterface
{
    protected $request;
    protected $logger;
    protected $productFactory;
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Catalog\Model\ProductFactory $productFactory
    )
    {
        $this->productFactory = $productFactory;
        $this->request = $request;
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data = $this->request->getParams();
        $time = $this->request->getPostValue();
        $id = $data['id'];
//        $product = $observer->getEvent()->getData('product');
        $start = $time['product']['time_start'];
        $end = $time['product']['time_end'];
        $result = $this->productFactory->create()->load($id);
        $result->setData('time_start',$start);
        $result->setData('time_end',$end);
    }
}
