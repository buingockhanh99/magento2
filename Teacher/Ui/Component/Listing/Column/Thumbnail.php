<?php


namespace Magenest\Teacher\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Catalog\Helper\Image;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;


class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    const NAME = 'thumbnail';

    const ALT_FIELD = 'name';
    private Image $imageHelper;
    private UrlInterface $urlBuilder;
    private StoreManagerInterface $storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,

        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->imageHelper = $imageHelper;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);

    }

    /**
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
               $url =  $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'teacher/images/'.$item['image'];
               $item[$fieldName . '_src'] = $url;
            }
        }

        return $dataSource;
    }





}
