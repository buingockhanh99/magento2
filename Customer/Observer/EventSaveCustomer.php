<?php
/**
 * EventSaveMovie
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Customer\Observer;


use Magento\Framework\App\Action\Context;
use Magento\Framework\Event\ObserverInterface;


class EventSaveCustomer implements ObserverInterface
{
    protected $getmessenger;


    public function __construct(
        Context $context
    )
    {

        $this->getmessenger = $context->getMessageManager();
    }


    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $data = $observer->getData('customer');

        $telephone = $data->getphonenumber();
        if ($telephone != '') {
            $a = substr($telephone, 0, 3);

            if (strlen($telephone) != 10 && strlen($telephone) != 13 && $a != '+84') {
                throw new \Exception('Vui Long nhap dung so dien thoai');

            } elseif ($a == '+84') {
                $newphone = str_replace('+84', '0', $telephone);
                $data->setphonenumber($newphone);
            }
        }


    }
}
