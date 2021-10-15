<?php
/**
 * CustomizePrice
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\CustomCheckOut\Plugin;


use Magento\Quote\Api\Data\CartInterface;
use Magento\Quote\Model\QuoteRepository\SaveHandler;

class CustomizePrice
{

    /**
     * @param \Magento\Quote\Model\QuoteRepository\SaveHandler $subject
     * @param CartInterface $quote
     * @return array
     */
    public function beforeSave(\Magento\Quote\Model\QuoteRepository\SaveHandler $subject, CartInterface $quote)
    {
        $items = $quote->getItems();
        return [$quote];
    }
}
