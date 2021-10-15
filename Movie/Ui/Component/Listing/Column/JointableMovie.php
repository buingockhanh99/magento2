<?php


namespace Magenest\Movie\Ui\Component\Listing\Column;


class JointableMovie extends \Magento\Ui\Component\Listing\Columns\Column
{


    protected $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magenest\Movie\Model\ResourceModel\Director\CollectionDirectorFactory $collectionFactory,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }


    public function prepareDataSource(array $dataSource)
    {
        $collection = $this->collectionFactory->create()->jointTable();

        $directorIds = $collection->getAllIds();
        $listDirectorArray = [];
        foreach ($collection->getData() as $datum) {
            if (isset($datum['director_id']) && isset($datum['movie_name'])) {
                $listDirectorArray[$datum['director_id']][$datum['movie_id']] = $datum['movie_name'];
            }
        }

        if (!$listDirectorArray) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as $key => $itemData) {
            if (isset($itemData['director_id']) && in_array($itemData['director_id'], $directorIds) && isset($listDirectorArray[$itemData['director_id']])) {
                $movieNameArray = $listDirectorArray[$itemData['director_id']];
                $movieName = implode(",", $movieNameArray);
                $dataSource['data']['items'][$key]['movie_name'] = $movieName;
            }
        }

        return $dataSource;




    }
}
