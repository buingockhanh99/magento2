<?php
/**
 * Content1
 *
 * @copyright Copyright © 2021 Khanh. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Report\Controller\Adminhtml\Report;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Content1st extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

//        $resultPage->setActiveMenu('Packt_HelloWorld::component');
//        $resultPage->addBreadcrumb(__('HelloWorld'), __('HelloWorld'));
//        $resultPage->addBreadcrumb(__('Components'), __('Components'));
//        $resultPage->getConfig()->getTitle()->prepend(__('Components'));
        return $resultPage;
    }

}
