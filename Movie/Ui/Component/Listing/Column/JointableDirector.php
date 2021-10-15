<?php
/**
 * JointableDirector
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Ui\Component\Listing\Column;


class JointableDirector extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected  $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magenest\Movie\Model\ResourceModel\Movie\CollectionMovieFactory $collectionFactory,
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

        foreach ($dataSource['data']['items'] as $key => $item ) {
           foreach ($collection->getData() as  $data)
           {
               if($item['director_id'] == $data['director_id'])
               {
                   $dataSource['data']['items'][$key]['director_id']  = $data['director_name'];
               }
           }

        }

        return $dataSource;





    }

}
