<?php
/**
 * Edit
 *
 * @copyright Copyright © 2021 magenest. All rights reserved.
 * @author    khanhthanhvh@gmail.com
 */

namespace Magenest\Teacher\Controller\Adminhtml\Teacher;


class Edit extends \Magenest\Teacher\Controller\Adminhtml\Teacher
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


        $id = $this->getRequest()->getParam('teacher_id');
        $model = $this->_objectManager->create(\Magenest\Teacher\Model\Teacher::class);

        // 2. Initial checking
        if($id){
            $model->load($id);
            if(!$model->getId())
            {
                $this->messageManager->addErrorMessage(__('This Teacher no longer exists'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('magenest_teacher_teacher', $model); // dang ky

        // 3. Build edit form
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Student') : __('New Teacher'),
            $id ? __('Edit Student') : __('New Teacher')
        );

        return $resultPage;
    }
}
