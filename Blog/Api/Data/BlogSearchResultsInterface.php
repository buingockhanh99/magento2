<?php
/**
 * BlogSearchResultsInterface
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Api\Data;


interface BlogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get Student list.
     * @return \Magenest\Blog\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Magenest\Blog\Api\Data\BlogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
