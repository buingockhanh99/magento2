<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Customer\Block\Account\Dashboard;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Block\Form\Register;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Customer\Helper\View;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Newsletter\Model\Subscriber;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Magenest\Customer\Model\ResourceModel\CustomerEntity\CollectionFactory as CollectG;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Dashboard Customer Info
 *
 * @api
 * @since 100.0.2
 */
class Info extends Template
{
    protected $_subscription;
    protected $_subscriberFactory;
    protected $_helperView;
    protected $currentCustomer;
    protected $collectionFactory;
    protected $collectionGroup;
    protected $collectionG;
    private  $storeManager;
    private UrlInterface $urlBuilder;

    /**
     * Constructor
     *
     * @param Context $context
     * @param CurrentCustomer $currentCustomer
     * @param SubscriberFactory $subscriberFactory
     * @param View $helperView
     * @param array $data
     */
    public function __construct(
        Context $context,
        CurrentCustomer $currentCustomer,
        SubscriberFactory $subscriberFactory,
        StoreManagerInterface $storeManager,
        \Magento\Framework\UrlInterface $urlBuilder,
        CollectionFactory $collectionFactory,
        CollectG $collectionG,
        View $helperView,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->collectionFactory = $collectionFactory;
        $this->collectionG = $collectionG;
        $this->urlBuilder = $urlBuilder;
        $this->currentCustomer = $currentCustomer;
        $this->_subscriberFactory = $subscriberFactory;
        $this->_helperView = $helperView;
        parent::__construct($context, $data);
    }

    /**
     * Returns the Magento Customer Model for this block
     *
     * @return CustomerInterface|null
     */
    public function getCustomer()
    {
        try {
            return $this->currentCustomer->getCustomer();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Get the full name of a customer
     *
     * @return string full name
     */
    public function getName()
    {
        return $this->_helperView->getCustomerName($this->getCustomer());
    }

    /**
     * Get the url to change password
     *
     * @return string
     */
    public function getChangePasswordUrl()
    {
        return $this->_urlBuilder->getUrl('customer/account/edit/changepass/1');
    }

    /**
     * Get Customer Subscription Object Information
     *
     * @return Subscriber
     */
    public function getSubscriptionObject()
    {
        if (!$this->_subscription) {
            $this->_subscription = $this->_createSubscriber();
            $customer = $this->getCustomer();
            if ($customer) {
                $websiteId = (int)$this->_storeManager->getWebsite()->getId();
                $this->_subscription->loadByCustomer((int)$customer->getId(), $websiteId);
            }
        }
        return $this->_subscription;
    }

    /**
     * Gets Customer subscription status
     *
     * @return bool
     *
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getIsSubscribed()
    {
        return $this->getSubscriptionObject()->isSubscribed();
    }




    /**
     * Create new instance of Subscriber
     *
     * @return Subscriber
     */
    protected function _createSubscriber()
    {
        return $this->_subscriberFactory->create();
    }

    /**
     * @inheritdoc
     */
    protected function _toHtml()
    {
        return $this->currentCustomer->getCustomerId() ? parent::_toHtml() : '';
    }

    public function getIMG()
    {
        $id =  $this->getCustomer()->getId();

        $collection = $this->collectionFactory->create()->addAttributeToSelect('*');
        $load = $collection->load();
        $pathAvatar = $load->getItemById($id)->getData('Avatar');

//        $picture_url = !empty($pathAvatar) ? $this->urlBuilder->getUrl(
//            'customer/index/viewfile/image/'.base64_encode($pathAvatar)
//        ) : null;

        $url =  $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'customer'.$pathAvatar;


        return $url;
    }

    public function getTelephone()
    {
        $id =  $this->getCustomer()->getId();

        $collection = $this->collectionFactory->create()->addAttributeToSelect('*');
        $load = $collection->load();

        $telephone = $load->getItemById($id)->getData('phonenumber');

        return $telephone;
    }

    public function getGroup()
    {
        $id =  $this->getCustomer()->getId();
        $jointable = $this->collectionG->create()->join('customer_group','main_table.group_id = customer_group.customer_group_id');
        $group = $jointable->getItemById($id)->getData('customer_group_code');
        return $group;
    }
}
