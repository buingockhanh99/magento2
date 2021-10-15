<?php


namespace Magenest\Customer\Ui\Component\Listing\Column;

use Magenest\Customer\Model\ResourceModel\Customer\Collection;
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
    protected $collectionFactory;
    protected $collection;
    private \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface;
    private \Magento\Framework\View\Result\PageFactory $resultPageFactory;

    private \Magento\Framework\Event\Observer $observer;
    protected $modelCustomer;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magenest\Customer\Model\ResourceModel\Customer\CollectionFactory $collection,
        \Magento\Customer\Model\CustomerFactory $modelCustomer,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $collectionFactory,
        \Magento\Framework\Event\Observer $observer,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        array $components = [],
        array $data = []
    ) {
        $this->observer =$observer;
        $this->modelCustomer =$modelCustomer;
        $this->resultPageFactory = $resultPageFactory;
        $this->collection = $collection;
        $this->collectionFactory = $collectionFactory;
        $this->storeManager = $storeManager;
        $this->imageHelper = $imageHelper;
        $this->urlBuilder = $urlBuilder;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
        parent::__construct($context, $uiComponentFactory, $components, $data);

    }


    /**
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function prepareDataSource(array $dataSource)
    {


        $collection = $this->collectionFactory->create()->addAttributeToSelect('*');
        $load = $collection->load();


        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {

                $pathAvatar = $load->getItemById($item['entity_id'])->getData('Avatar');

                $picture_url = !empty($pathAvatar) ? $this->urlBuilder->getUrl(
                    'customer/index/viewfile/image/'.base64_encode($pathAvatar)
                ) : null;

                $item[$fieldName . '_src'] = $picture_url;
                $item[$fieldName . '_orig_src'] = $picture_url;
            }

        }

        return $dataSource;
    }



}
