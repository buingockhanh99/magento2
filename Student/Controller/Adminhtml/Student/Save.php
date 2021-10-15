<?php
declare(strict_types=1);

namespace Magenest\Student\Controller\Adminhtml\Student;

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
            $id = $this->getRequest()->getParam('student_id');

            $model = $this->_objectManager->create(\Magenest\Student\Model\Student::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Student no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Student.'));
                $this->dataPersistor->clear('magenest_student_student');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['student_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Student.'));
            }

            $this->dataPersistor->set('magenest_student_student', $data);
            return $resultRedirect->setPath('*/*/edit', ['student_id' => $this->getRequest()->getParam('student_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

