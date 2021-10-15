<?php


namespace Magenest\Chapter10\Controller\Adminhtml\Banner;

use \Magenest\Chapter10\Model\Banner;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class Delete extends \Magenest\Chapter10\Controller\Adminhtml\Banner
{
    protected  $bannerFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magenest\Chapter10\Model\BannerFactory $bannerFactory
    )
    {
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context, $coreRegistry);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('banner_id');
        if ($id) {
            try {
                $model = $this->bannerFactory->create();//$this->_objectManager->create(\Magenest\Chapter10\Model\Banner::class);
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccessMessage(__('You deleted the Banner.'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['banner_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a banner to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
