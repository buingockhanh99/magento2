<?php


namespace Magenest\Teacher\Controller\Adminhtml\Teacher;

use \Magenest\Teacher\Model\Teacher;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class Delete extends \Magenest\Teacher\Controller\Adminhtml\Teacher
{
    private \Magenest\Teacher\Model\TeacherFactory $teacherFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magenest\Teacher\Model\TeacherFactory $teacherFactory
    )
    {
        $this->teacherFactory = $teacherFactory;
        parent::__construct($context, $coreRegistry);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('teacher_id');
        if ($id) {
            try {
                $model = $this->teacherFactory->create();//$this->_objectManager->create(\Magenest\Teacher\Model\Teacher::class);
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccessMessage(__('You deleted the Teacher.'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['teacher_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a teacher to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
