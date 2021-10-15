<?php
declare(strict_types=1);

namespace Magenest\Student\Controller\Adminhtml\Student;

class Delete extends \Magenest\Student\Controller\Adminhtml\Student
{

    public function execute()
    {

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('student_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Magenest\Student\Model\Student::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Student.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['student_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Student to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

