<?php

namespace Magenest\Movie\Plugin;

use Magento\Checkout\CustomerData\AbstractItem;
use Magento\Framework\App\ObjectManager;
use Magento\Quote\Model\Quote\Item;

class UpdateProductName
{
    public function afterGetItemData(
        AbstractItem $subject,
        $result,
        Item $item
    ) {
        $childProductSKU = $item->getData()['sku'];
        $objectManager = ObjectManager::getInstance();
        $product = $objectManager->get('Magento\Catalog\Api\ProductRepositoryInterface')->get($childProductSKU);
        $result['product_name'] = $product->getName();

        return $result;
    }
}
