<?php
/**
 * Observer
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Model;

use Magento\Framework\Event\ObserverInterface;

class Observer implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getProduct();
        $category = $observer->getCategory();

        $this->logger->debug(print_r($product->debug(), true));
        $this->logger->debug(print_r($category->debug(), true));

        //$this->logger->debug('Registered');
    }
}
