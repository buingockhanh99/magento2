<?php
/**
 * LoadRating
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Movie\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;

class LoadRating extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $directorFactory;
    protected $urlBuilder;
    protected  $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magenest\Movie\Model\ResourceModel\Movie\CollectionMovieFactory $collectionFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magenest\Movie\Model\MovieFactory $directorFactory,
        array $components = [],
        array $data = []

    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->urlBuilder = $urlBuilder;
        $this->directorFactory = $directorFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {

        $collection = $this->collectionFactory->create();
        $model = $this->directorFactory->create();


        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $model->load($item['movie_id']);
                $rating = $item['rating'];
                if(isset($rating))
                {
                    switch ($rating)
                    {
                        case "5 sao":
                            $item[$this->getData('name')] = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
                            break;
                        case "4 sao":
                            $item[$this->getData('name')] = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span>';
                            break;
                        case "3 sao":
                            $item[$this->getData('name')] = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
                            break;
                        case "2 sao":
                            $item[$this->getData('name')] = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
                            break;
                        case "1 sao":
                            $item[$this->getData('name')] = '<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
                            break;
                        default:
                            $item[$this->getData('name')] = '0 sao';
                    }
                }
            }
            return $dataSource;
        }

    }
}
