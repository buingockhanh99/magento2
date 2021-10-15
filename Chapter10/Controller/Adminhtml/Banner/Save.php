<?php
namespace Magenest\Chapter10\Controller\Adminhtml\Banner;

use Magento\Framework\Exception\LocalizedException;
use Magenest\Chapter10\Model\Banner;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;
    protected $model;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        Banner $model
    ) {
        $this->model = $model;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue();

        if($data){
            $id = $this->getRequest()->getParam('banner_id');
            $model = $this->model->load($id);

            //kiem tra id trong model va id tu data
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Banner no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $data['image'] = $data['images'][0]['name'];
            $data['banner_id'] = 1;

            $model->setData($data); //do du lieu tai len vao model

            try {
                $model->save();

                $this->messageManager->addSuccessMessage(__('You saved the Banner.'));
                $this->dataPersistor->clear('magenest_banner');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['banner_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Banner.'));
            }

            $this->dataPersistor->set('magenest_banner', $data);
            return $resultRedirect->setPath('*/*/edit', ['banner_id' => $this->getRequest()->getParam('banner_id')]);
        }
        return $resultRedirect->setPath('*/*/');

    }

}
