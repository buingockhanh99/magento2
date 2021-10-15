<?php


namespace Magenest\Teacher\Ui\Component\Listing\Column;

class TeacherActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    const URL_PATH_DELETE = 'magenest_teacher/teacher/delete';
    const URL_PATH_INDEX = 'm242.local/admin/admin';
    const URL_PATH_DETAILS = 'magenest_teacher/teacher/details';
    protected $urlBuilder;
    const URL_PATH_EDIT = 'magenest_teacher/teacher/edit';


    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;

        parent::__construct($context, $uiComponentFactory, $components, $data);
    }


    public function prepareDataSource(array $dataSource)
    {
      //  $id = $this->getRequest()->getParam('teacher_id');

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {

                if (isset($item['teacher_id'])) {
                    $item[$this->getData('name')] = [

                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'teacher_id' => $item['teacher_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],

                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'teacher_id' => $item['teacher_id']
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
                                    'teacher_id' => $item['teacher_id']
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

