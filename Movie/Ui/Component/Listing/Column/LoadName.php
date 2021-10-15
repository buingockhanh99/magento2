<?php

namespace Magenest\Movie\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;

class LoadName extends \Magento\Ui\Component\Listing\Columns\Column

{

    protected $directorFactory;
    protected $urlBuilder;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magenest\Movie\Model\DirectorFactory $directorFactory,
        array $components = [],
        array $data = []

    )
    {
        $this->urlBuilder = $urlBuilder;
        $this->directorFactory = $directorFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        $model = $this->directorFactory->create();
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $model->load($item['director_id']);
                $item['director_id'] = [
                    $model->getData('name') => [
                        'href' =>$this->urlBuilder->getUrl("magenest_movie/director/index") ,
                        'label' => $model->getData('name'),
                    ]
                ];
            }
            return $dataSource;
        }
    }
}
