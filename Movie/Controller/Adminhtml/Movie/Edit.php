<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;


class Edit extends \Magenest\Movie\Controller\Adminhtml\Movie
{

    protected $resultPageFactory;
    protected $movieFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Movie\Model\MovieFactory $movieFactory
    ) {
        $this->movieFactory = $movieFactory;
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
        $id = $this->getRequest()->getParam('movie_id');
        $model = $this->movieFactory->create();

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Movie no longer exists.'));

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('magenest_movie', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Movie') : __('New Movie'),
            $id ? __('Edit Movie') : __('New Movie')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Movie'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Movie %1', $model->getId()) : __('New Movie'));
        return $resultPage;
    }
}
