<?php


namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;
    protected $movieFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magenest\Movie\Model\MovieFactory $movieFactory
    ) {
        $this->movieFactory = $movieFactory;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }


    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('movie_id');

            $model = $this->movieFactory->create()->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Movie no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
//                $this->_eventManager->dispatch(
//                    'test',
//                    ['model' => $model, 'request' => $this->getRequest(), 'response' => $this->getResponse()]
//                );
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Movie.'));
                $this->dataPersistor->clear('magenest_movie');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['movie_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Movie.'));
            }

            $this->dataPersistor->set('magenest_movie', $data);
            return $resultRedirect->setPath('*/*/edit', ['movie_id' => $this->getRequest()->getParam('movie_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
