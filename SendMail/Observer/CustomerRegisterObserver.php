<?php
/**
 * CustomerRegisterObserver
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\SendMail\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magenest\SendMail\Helper\Email;

class CustomerRegisterObserver implements ObserverInterface
{
    private $helperEmail;

    public function __construct(
        Email $helperEmail
    ) {
        $this->helperEmail = $helperEmail;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        return $this->helperEmail->sendEmail();
    }
}
