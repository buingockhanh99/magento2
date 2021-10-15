<?php
/**
 * CheckPrice
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\CustomCheckOut\Plugin;


use Magento\Framework\App\Action\Context;
use Magento\Quote\Api\Data\CartInterface;
use Magento\Quote\Model\QuoteRepository\SaveHandler;
use Magento\TestFramework\Event\Magento;

class CheckPrice
{

    protected $_request;

    protected $resultFactory;

    public function __construct(
        \Magento\Checkout\Model\Cart  $cart,
        Context $context
    ) {
        $this->cart = $cart;
        $this->_request = $context->getRequest();
    }

    /**
     * @param \Magento\Quote\Model\QuoteRepository\SaveHandler $subject
     * @param CartInterface $quote
     * @return array
     */
    public function beforeSave(\Magento\Quote\Model\QuoteRepository\SaveHandler $subject, CartInterface $quote)
    {
        $items = $quote->getItems();
        if($items)
        {
            foreach ($items as $item) {
                $price = 500;
                $item->setCustomPrice($price);
                $item->setOriginalCustomPrice($price);
                $item->getProduct()->setIsSuperMode(true);
            }
        }

        return [$quote];

    }
}
