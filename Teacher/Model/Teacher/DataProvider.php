<?php
namespace Magenest\Teacher\Model\Teacher;

use Magenest\Teacher\Model\ResourceModel\Teacher\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManager;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $loadedData;
    protected $dataPersistor;
    protected $collection;
    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }


    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {

            $data = $model->getData();
            $image = $data['image'];

            $data['images'][0]['url'] =  $this->storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
                ) . 'teacher/images/' . $image;
            $data['images'][0]['name'] = $image;

            $this->loadedData[$model->getId()] = $data;

        }
            $data = $this->dataPersistor->get('magenest_teacher_teacher'); //su dung du lieu tam thoi

        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('magenest_teacher_teacher');
        }

        return $this->loadedData;
    }
}
