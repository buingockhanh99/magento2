<?php
/**
 * CheckCartQtyObserver
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;

class CheckCartQtyObserver implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
//        if ($observer->getProduct()->getQty() %1!= 0) {
//            //Odd qty
//            //  echo "Dell mua dc dau";
//            throw new \Exception('Qty must be even');
//        }
    }
}
