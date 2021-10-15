<?php

namespace Magenest\Blog\Controller\Adminhtml\Blog;


use Magenest\Blog\Model\BlogFactory;

class Edit extends \Magenest\Blog\Controller\Adminhtml\Blog
{

    protected $resultPageFactory;

    public function __construct(
        \Magenest\Blog\Model\BlogFactory $blogFactory ,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->blogFactory = $blogFactory;
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
        $id = $this->getRequest()->getParam('id');
        $model = $this->blogFactory->create();
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
            $id ? __('Edit Blog') : __('New Blog'),
            $id ? __('Edit Blog') : __('New Blog')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Blog'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Blog %1', $model->getId()) : __('New Blog'));
        return $resultPage;
    }
}
