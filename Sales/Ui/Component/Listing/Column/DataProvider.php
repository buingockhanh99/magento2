<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magenest\Sales\Ui\Component\Listing\Column;

use Magenest\Sales\Model\ResourceModel\SetupModule\CollectionFactory;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Api\Search\SearchCriteria;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;
    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param SearchCriteriaInterface $searchCriteria
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ReportingInterface $reporting
     * @param SearchResultInterface $searchResult
     * @param array $meta
     * @param array $data
     */

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        SearchCriteriaInterface $searchCriteria,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ReportingInterface $reporting,
        SearchResultInterface $searchResult,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->searchCriteria = $searchCriteria;
        $this->searchResult = $searchResult;
        $this->reporting = $reporting;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->name = $name;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return SearchCriteria|SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        if (!$this->searchCriteria) {
            $this->searchCriteria = $this->searchCriteriaBuilder->create();
            $this->searchCriteria->setRequestName($this->name);
        }
        return $this->searchCriteria;
    }
}
