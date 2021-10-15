<?php


namespace Magenest\Chapter10\Controller\Adminhtml\Banner;


class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);  //lop cha
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        $resultPage->getConfig()->getTitle()->prepend(__("Edit Banner")); //title
        return $resultPage;
    }
}
