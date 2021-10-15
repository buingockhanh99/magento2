<?php

namespace Magenest\Movie\Controller\Adminhtml\Director;


class Edit extends \Magenest\Movie\Controller\Adminhtml\Director
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

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('director_id');
        $model = $this->_objectManager->create(\Magenest\Movie\Model\Director::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Director no longer exists.'));

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('magenest_director', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Director') : __('New Director'),
            $id ? __('Edit Director') : __('New Director')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Director'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Director %1', $model->getId()) : __('New Director'));
        return $resultPage;
    }
}
