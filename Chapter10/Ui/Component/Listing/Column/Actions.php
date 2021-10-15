<?php


namespace Magenest\Chapter10\Ui\Component\Listing\Column;

class Actions extends \Magento\Ui\Component\Listing\Columns\Column
{

    const URL_PATH_DELETE = 'magenest_chapter10/banner/delete';
    const URL_PATH_INDEX = 'm242.local/admin/admin';
    const URL_PATH_DETAILS = 'magenest_chapter10/banner/details';
    protected $urlBuilder;
    const URL_PATH_EDIT = 'magenest_chapter10/banner/edit';


    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory           $uiComponentFactory,
        \Magento\Framework\UrlInterface                              $urlBuilder,
        array                                                        $components = [],
        array                                                        $data = []
    )
    {
        $this->urlBuilder = $urlBuilder;

        parent::__construct($context, $uiComponentFactory, $components, $data);
    }


    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {

                if (isset($item['banner_id'])) {
                    $item[$this->getData('name')] = [

                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'banner_id' => $item['banner_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],

                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'banner_id' => $item['banner_id']
                                ]
                            ),

                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __("Delete %1", $item["name"]),
                                'message' => __("Are you sure you wan\'t to delete a %1 record?", $item["name"])
                            ]
                        ],

                        'test' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_INDEX,
                                [
                                    'banner_id' => $item['banner_id']
                                ]
                            ),
                            'label' => __('Test'),

                        ]

                    ];
                }
            }
        }

        return $dataSource;
    }
}

