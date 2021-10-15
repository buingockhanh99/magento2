<?php
/**
 * Index
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Blog\Controller\Adminhtml\Category;


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

        $resultPage->getConfig()->getTitle()->prepend(__("Category")); //title
        return $resultPage;
    }
}

