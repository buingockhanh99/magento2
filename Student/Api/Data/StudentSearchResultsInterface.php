<?php
declare(strict_types=1);

namespace Magenest\Student\Api\Data;

interface StudentSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Student list.
     * @return \Magenest\Student\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Magenest\Student\Api\Data\StudentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

