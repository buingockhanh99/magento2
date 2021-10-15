<?php
/**
 * DataProvider
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Model\Blog;

use Magenest\Blog\Model\ResourceModel\Blog\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $loadedData;
    protected $dataPersistor;
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
        }
        $data = $this->dataPersistor->get('magenest_blog');

        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('magenest_blog');
        }

        return $this->loadedData;
    }
}
