<?php
/**
 * CustomerPriceAfter
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\CustomCheckOut\Plugin;


use Magento\Quote\Api\Data\CartInterface;
use Magento\Quote\Model\QuoteRepository\SaveHandler;

class CustomerPriceAfter
{

    /**
     * @param \Magento\Quote\Model\QuoteRepository\SaveHandler $subject
     * @param $result
     * @param CartInterface $quote
     */
    public function afterSave(\Magento\Quote\Model\QuoteRepository\SaveHandler $subject, $result, CartInterface $quote)
    {
        // TODO: Implement plugin method.
        return $result;
    }
}
