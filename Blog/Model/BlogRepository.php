<?php
/**
 * BlogRepository
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Model;


use Magenest\Blog\Api\Data\BlogInterface;
use Magenest\Blog\Api\Data\BlogSearchResultsInterfaceFactory;
use Magenest\Blog\Api\BlogRepositoryInterface;
use Magenest\Blog\Model\ResourceModel\Blog as ResourceBlog;
use Magenest\Blog\Model\ResourceModel\Blog\CollectionFactory as BlogCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class BlogRepository implements BlogRepositoryInterface
{
    protected $blogFactory;

    protected $blogCollectionFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $dataBlogFactory;


    public function __construct(
        ResourceBlog $resource,
        BlogFactory $blogFactory,
        BlogInterfaceFactory $dataBlogFactory,
        BlogCollectionFactory $blogCollectionFactory,
        BlogSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->blogFactory = $blogFactory;
        $this->blogCollectionFactory = $blogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBlogFactory = $dataBlogFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    public function save(
        \Magenest\Blog\Api\Data\BlogInterface $blog
    ) {


        $blogData = $this->extensibleDataObjectConverter->toNestedArray(
            $blog,
            [],
            \Magenest\Blog\Api\Data\BlogInterface::class
        );

        $blogModel = $this->blogFactory->create()->setData($blogData);

        try {
            $this->resource->save($blogModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the blog: %1',
                $exception->getMessage()
            ));
        }
        return $blogModel->getDataModel();
    }

    public function get($id)
    {
        $blog = $this->blogFactory->create();
        $this->resource->load($blog, $id);
        if (!$blog->getId()) {
            throw new NoSuchEntityException(__('Blog with id "%1" does not exist.', $id));
        }
        return $blog->getDataModel();
    }

    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->blogCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Magenest\Blog\Api\Data\BlogInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(
        \Magenest\Blog\Api\Data\BlogInterface $blog
    ) {
        try {
            $blogModel = $this->blogFactory->create();
            $this->resource->load($blogModel, $blog->getId());
            $this->resource->delete($blogModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Blog: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    public function deleteById($id)
    {
        return $this->delete($this->get($id));
    }
}
