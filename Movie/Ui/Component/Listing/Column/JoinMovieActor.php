<?php
/**
 * JoinMovieActor
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Ui\Component\Listing\Column;


class JoinMovieActor extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected  $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magenest\Movie\Model\ResourceModel\Actor\CollectionActorFactory $collectionFactory,
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
            foreach ($collection->getData() as & $data)
            {
                if($item['actor_id'] == $data['actor_id'])
                {
                    $dataSource['data']['items'][$key]['movie_name'][]  = [$data['movie_name']];
                }
            }
        }


        return $dataSource;


//        $listDirectorArray = [];
//        foreach ($collection->getData() as  $data)
//        {
//            if(isset($data['actor_id']) && isset($data['movie_id']) && isset($data['movie_name']))
//            {
//                $listDirectorArray[$data['actor_id']][$data['movie_id']] = $data['movie_name'];
//            }
//        }
//
//        if (!$listDirectorArray) {
//            return $dataSource;
//        }
//
//        foreach ($dataSource['data']['items'] as $key => $item)
//        {
//            if(isset($listDirectorArray[$item['actor_id']]) && $item['actor_id']) {
//                $movieNameArray = $listDirectorArray[$item['actor_id']];
//                $movieName = implode(",", $movieNameArray);
//                $dataSource['data']['items'][$key]['movie_name'][] = $listDirectorArray[$item['actor_id']];
//            }
//        }






    }
}
