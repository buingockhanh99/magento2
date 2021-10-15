<?php


namespace Magenest\Movie\Controller\Adminhtml\Director;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }


    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('director_id');

            $model = $this->_objectManager->create(\Magenest\Movie\Model\Director::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Director no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
//                $this->_eventManager->dispatch(
//                    'test',
//                    ['model' => $model, 'request' => $this->getRequest(), 'response' => $this->getResponse()]
//                );
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Director.'));
                $this->dataPersistor->clear('magenest_director');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['director_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Director.'));
            }

            $this->dataPersistor->set('magenest_director', $data);
            return $resultRedirect->setPath('*/*/edit', ['director_id' => $this->getRequest()->getParam('director_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
