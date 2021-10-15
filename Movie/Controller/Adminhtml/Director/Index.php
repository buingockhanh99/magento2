<?php

namespace Magenest\Movie\Controller\Adminhtml\Director;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);  //lop cha
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Magenest_Movie::movie');
        $resultPage->addBreadcrumb(__('Movie'), __('Movie'));
        $resultPage->addBreadcrumb(__('ManageSubscriptions'), __('Manage Subscriptions'));

        $resultPage->getConfig()->getTitle()->prepend(__("Director")); //title
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Movie::movie');
 }
}
