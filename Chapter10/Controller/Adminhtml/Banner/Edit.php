<?php
/**
 * Edit
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Chapter10\Controller\Adminhtml\Banner;


class Edit extends \Magenest\Chapter10\Controller\Adminhtml\Banner
{
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    public function execute(){
        // 1. Get ID and create model


        $id = $this->getRequest()->getParam('banner_id');
        $model = $this->_objectManager->create(\Magenest\Chapter10\Model\Banner::class);

        // 2. Initial checking
        if($id){
            $model->load($id);
            if(!$model->getId())
            {
                $this->messageManager->addErrorMessage(__('This Banner no longer exists'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('magenest_banner', $model); // dang ky

        // 3. Build edit form
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Banner') : __('New Banner'),
            $id ? __('Edit Banner') : __('New Banner')
        );

        return $resultPage;
    }
}
