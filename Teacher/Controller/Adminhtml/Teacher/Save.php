<?php
namespace Magenest\Teacher\Controller\Adminhtml\Teacher;

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

        if($data){
            $id = $this->getRequest()->getParam('teacher_id');
            $model = $this->_objectManager->create(\Magenest\Teacher\Model\Teacher::class)->load($id);  //tao moi model

            //kiem tra id trong model va id tu data
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Teacher no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $data['image'] = $data['images'][0]['name'];

            $model->setData($data); //do du lieu tai len vao model

            try {
                $model->save();

                $this->messageManager->addSuccessMessage(__('You saved the Teacher.'));
                $this->dataPersistor->clear('magenest_teacher_teacher');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['teacher_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Teacher.'));
            }

            $this->dataPersistor->set('magenest_teacher_teacher', $data);
            return $resultRedirect->setPath('*/*/edit', ['teacher_id' => $this->getRequest()->getParam('teacher_id')]);
        }
        return $resultRedirect->setPath('*/*/');

    }

}
