<?php
/**
 * CustomPrice
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\CustomCheckOut\Observer;


use Magento\Framework\App\Action\Context;
use Magento\Framework\Event\ObserverInterface;


class CustomPrice  implements ObserverInterface
{
    protected $_request;

    protected $resultFactory;

    public function __construct(
        Context $context
    ) {
        $this->_request = $context->getRequest();
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $params = $this->_request->getParams();
        if(isset($params['options'])) {
            $item = $params['options']['11'];
            if (isset($item)) {
                if (strlen(strstr($item, '*')) > 0) {
                    $a = explode('*', $item);
                    $S = 1;
                    switch (count($a))
                    {
                        case 2:
                            for($i=0 ; $i<2 ; $i++)
                            {
                                $S = $S * (int)$a[$i];
                            }
                            break;
                        case 3:                              //hinh tam giac
                            $c1 = (int)$a[0];
                            $c2 = (int)$a[1];
                            $c3 = (int)$a[2];
                            $p = ($c1 + $c2 + $c3)/2;        //1/2 chu vi
                            $S =  sqrt($p*($p-$c1)*($p-$c2)*($p-$c3));     //Heron
                            break;
                        default:
                            break;
                    }

                        $dataProduct = $observer->getEvent()->getData('product');
                        $getDataProduct = $dataProduct->getData();

                        $moretPrice = (int)$getDataProduct['options'][0]->getData('price');
                        $defaultPrice = (int)$getDataProduct['price'];
                        $newPrice = $defaultPrice + ($S * $moretPrice);

                        $item = $observer->getEvent()->getData('quote_item');
                        $item = ($item->getParentItem() ? $item->getParentItem() : $item);
                        $price = $newPrice; //set your price here
                        $item->setCustomPrice($price);
                        $item->setOriginalCustomPrice($price);
                        $item->getProduct()->setIsSuperMode(true);


                }

            }
        }

    }
}
